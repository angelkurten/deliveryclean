<?php


namespace App\Repositories\Contracts;


interface UserRepositoryInterface
{


    public function getModel();

    public function all();

    public function findById(int $id);

    public function create(array $data);

    public function where(string $column, string $operator, string $value);

}
