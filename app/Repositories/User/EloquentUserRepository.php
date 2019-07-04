<?php


namespace App\Repositories\User;


use App\Entities\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Http\Request;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepositoryInterface
{

    /**
     * @return string|User
     */
    public function getModel()
    {
        return new User();
    }

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->getModel()->all();
    }

    /**
     * @param int $id
     * @return User
     */
    public function findById(int $id)
    {
        return $this->getModel()->find($id);
    }


    /**
     * @param array $data
     * @return User
     */
    public function create(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->getModel()->create($data);
    }

    /**
     * @param array $wheres
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function where($wheres = [])
    {
        $wheres = $this->parseWheres($wheres);
        return $this->getModel()->where($wheres)->get();
    }

    /**
     * @param array $data
     * @return array
     */
    private function parseWheres(array $data): array
    {
        $wheres = [];
        foreach ($data as $column => $value) {
            $wheres[] = [$column, '=', $value];
        }
        return $wheres;
    }
}
