<?php


namespace App\Usecases\Users;


use App\Repositories\Contracts\UserRepositoryInterface;
use App\Usecases\Contratcs\Users\ListUserInterface;

class ListUserUsecase implements ListUserInterface
{

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle($filter = null, $value = null)
    {
        if(is_null($filter) and is_null($value)){
            return $this->userRepository->all();
        }

        return $this->userRepository->where($filter, '=', $value);
    }
}
