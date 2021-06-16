<?php

namespace App\Http\Controllers;

use App\Models\PR_Payroll;
use App\Models\PR_Employee;
use App\Models\HRM_Employee;

class StaticController extends Controller
{
    public function totalearnings()
    {
        $query = PR_Payroll::query();
        $total = $query->sum('PaidToDays');
        $list = $query->get();

        return view('statics.totalearnings', compact('list', 'total'));
    }

    public function vacationdays()
    {
        $list = PR_Employee::all();

        return view('statics.vacationdays', compact('list'));
    }

    public function averagebenefits()
    {
        $query = HRM_Employee::query();
        $average = $query->avg('benefits');
        $list = $query->get();

        return view('statics.averagebenefits', compact('list', 'average'));
    }
}
