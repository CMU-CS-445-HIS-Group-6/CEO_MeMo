<?php

namespace App\Http\Controllers;

use App\Models\PR_Employee;
use App\Models\HRM_Personal;

class StaticController extends Controller
{
    public function totalearnings()
    {
        $query = PR_Employee::query();
        $total = $query->sum('PaidToDays');
        $list = $query->orderBy('PaidToDays', 'DESC')->get();

        return view('statics.totalearnings', compact('list', 'total'));
    }

    public function vacationdays()
    {
        $list = PR_Employee::orderBy('idEmployee', 'ASC')->get();

        return view('statics.vacationdays', compact('list'));
    }

    public function averagebenefits()
    {
        $query = HRM_Personal::query();
        $average = $query->avg('benefits');
        $list = $query->get();

        return view('statics.averagebenefits', compact('list', 'average'));
    }
}
