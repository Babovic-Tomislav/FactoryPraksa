<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Repository\Employee\EmployeeRepository;
use App\Repository\User\UserRepository;
use App\Requests\StoreUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return View
     */
    public function create()
    {
        return view('auth.register');
    }

    public function store(
        StoreUser $request,
        EmployeeRepository $employeeRepository,
        UserRepository $userRepository
    ) {
        $employee
            = $employeeRepository->create($this->getEmployeeDataFromRequest($request));

        Auth::login($user = $userRepository
            ->create($employee->id, $this->getUserDataFromRequest($request)));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

    private function getEmployeeDataFromRequest(StoreUser $request)
    {
        return [
            'name'               => $request->name,
            'email'              => $request->email,
            'surname'            => $request->surname,
            'address'            => $request->address,
            'role_id'            => 1,
            'vacation_days_left' => 20,
        ];
    }

    private function getUserDataFromRequest(StoreUser $request)
    {
        return [
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ];
    }
}
