<?php


namespace App\Repository\User;


interface UserRepositoryInterface
{
    public function all();
    public function store();
    public function create(int $employeeId, array $data);

}