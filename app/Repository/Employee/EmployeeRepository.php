<?php


namespace App\Repository\Employee;


use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeRepository implements IEmployeeRepository
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

    public function getLoggedUser()
    {
        return Employee::where('id', Auth::user()
            ->employee_id)
            ->with('role')
            ->with('vacation')
            ->first();
    }
}