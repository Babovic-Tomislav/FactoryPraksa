<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use App\Repository\Employee\EmployeeRepository;
use App\Repository\Employee\EmployeeRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class ApproverController extends Controller
{
    public function index(EmployeeRepositoryInterface $employeeRepository)
    {
        dd(1);
        return view('Employee.approver_homepage');
    }

    public function vacation(EmployeeRepositoryInterface $employeeRepository)
    {
        $employee = $employeeRepository->getLoggedUser(['vacation', 'role']);

        return view('Employee.vacation_form')
            ->with('days', $employee->vacation_days_left)
            ->with('vacationRequests', $employee->vacation)
            ->with('role', $employee->role->role_name);
    }

    public function vacationList()
    {
        return view('welcome');
    }
}
