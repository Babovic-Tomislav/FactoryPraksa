<?php


namespace App\Repository\User;


use App\Models\User;

class UserRepository implements IUserRepository
{

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function create(int $employeeId, array $data)
    {
        $data += ['employee_id' => $employeeId];
        return User::create($data);
    }
}