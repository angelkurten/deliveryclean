<?php


namespace App\Usecases\Contratcs\Users;


use App\Repositories\Contracts\UserRepositoryInterface;

interface ListUserInterface
{
    public function __construct(UserRepositoryInterface $userRepository);

    public function handle($wheres = []);
}
