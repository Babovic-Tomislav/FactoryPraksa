<?php


namespace App\Repository\User;


interface IUserRepository
{
    public function all();
    public function store();
    public function create(int $employeeId, array $data);

}