<?php

namespace App\Http\Middleware;


use App\Providers\RouteServiceProvider;
use App\Repository\Employee\EmployeeRepositoryInterface;
use Closure;

class RoleCheck
{
    private $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function handle($request, Closure $next, string $role)
    {
        $employee     = $this->employeeRepository->getLoggedUser(['role']);

        if ($employee->role->role_name == $role) {
            return $next($request);
        } else {
            return redirect(RouteServiceProvider::HOME);
        }
    }
}