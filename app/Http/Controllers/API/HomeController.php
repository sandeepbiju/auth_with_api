<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function profile_details(){
        $userDetails = auth()->user();
        $userDetails['employee_details'] = Employee::where('user_id',auth()->user()->id)->select('id as employee_id','first_name','last_name','phone')->first();

        return $userDetails;
    }

    public function company_details(){
        $companies = Employee::with('company')->where('user_id', auth()->user()->id)->select('company_id')->first();

        return $companies;
    }
}
