<?php

namespace App\Repository\Employee;

Interface EmployeeRepositoryInterface
{
    public function all();

    public function store();

    public function create(array $data);

    public function getLoggedUser(array $withParameters = []);
}