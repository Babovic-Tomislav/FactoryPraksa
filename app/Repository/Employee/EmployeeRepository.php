<?php


namespace App\Repository\Employee;


use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeRepository implements EmployeeRepositoryInterface
{

    public function all()
    {
        return Employee::all();
    }

    public function store()
    {
    }

    public function create(array $data)
    {
        return Employee::create($data);
    }

    public function getLoggedUser(array $withParameters = [])
    {
        return Employee::where('id', Auth::user()->employee_id)
            ->with($withParameters)
            ->first();
    }
}