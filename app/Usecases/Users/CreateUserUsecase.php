<?php


namespace App\Usecases\Users;


use App\Repositories\Contracts\UserRepositoryInterface;
use App\Usecases\Contratcs\Users\CreateUserInterface;

class CreateUserUsecase implements CreateUserInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function handle(array $data)
    {
        return $this->userRepository->create($data);
    }


}
