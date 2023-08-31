<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function employees()
    {
        $employees = Employee::with('company_details')->get();

        foreach ($employees as $employee) {
            $employee->company['logo'] = $employee->company['logo'] ? asset('storage/' . $employee->company['logo']) : '';
        }
        $success['employees'] = $employees;

        return $this->sendResponse($success, 'Employees fetched.');;
    }
}
