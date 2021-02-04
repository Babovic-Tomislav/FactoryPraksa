<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use App\Models\User;
use App\Repository\Employee\EmployeeRepository;
use App\Repository\Employee\EmployeeRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{
    public function index(EmployeeRepositoryInterface $employeeRepository)
    {
        $employee = $employeeRepository->getLoggedUser(['vacation', 'role']);

        return view('dashboard')
            ->with('days', $employee->vacation_days_left)
            ->with('vacationRequests', $employee->vacation)
            ->with('role', $employee->role->role_name);

    }
}
