<?php


namespace App\Repository\Employee;


Interface IEmployeeRepository
{
    public function all();
    public function store();
    public function create(array $data);
    public function getLoggedUser();

}