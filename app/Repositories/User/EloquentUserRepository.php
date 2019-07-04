<?php


namespace App\Repositories\User;


use App\Entities\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\EloquentBaseRepository;

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
     * @param string $column
     * @param string $operator
     * @param string $value
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function where(string $column, string $operator, string $value)
    {
        return $this->getModel()->where($column, $operator, $value)->get();
    }
}
