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

    public function handle($wheres = [])
    {
        if(empty($wheres)){
            return $this->userRepository->all();
        }

        return $this->userRepository->where($wheres);
    }
}
