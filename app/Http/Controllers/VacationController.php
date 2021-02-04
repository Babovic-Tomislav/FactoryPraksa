<?php

namespace App\Http\Controllers;

use App\Models\Vacation;
use App\Repository\Employee\EmployeeRepositoryInterface;
use App\Requests\VacationRequestCreate;
use Illuminate\Support\Facades\Auth;

class VacationController extends Controller
{
    public function create(VacationRequestCreate $request)
    {
        $data = [
            'start_date' => date('Y-m-d', strtotime($request->startDate)),
            'end_date' => date('Y-m-d', strtotime($request->endDate)),
            'employee_id' => Auth::user()->employee_id
            ];

        Vacation::create($data);

        return redirect('/employee');
    }
}
