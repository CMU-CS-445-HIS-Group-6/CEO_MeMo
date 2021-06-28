<?php

namespace App\Http\Controllers;

use App\Models\PR_Employee;
use App\Models\HRM_Personal;
use App\Models\HRM_Employment;

class NotificationController extends Controller
{
    public function benefit()
    {
        $list = HRM_Personal::where('benefits_old', '!=', 0)->get();

        return view('notifications.benefit', compact('list'));
    }

    public function daysoff()
    {
        $allowed = 3;
        $list = PR_Employee::where('VacationDays', '>', $allowed)->orderBy('VacationDays', 'DESC')->get();

        return view('notifications.daysoff', compact('list', 'allowed'));
    }

    public function fullyear()
    {
        $list = HRM_Employment::where('Hire_Date', '<', now()->subDays(365))->orderBy('Hire_Date', 'ASC')->get();

        return view('notifications.fullyear', compact('list'));
    }

    public function birthday()
    {
        $list = HRM_Personal::whereMonth('Birthday', date_format(now(), "m"))->orderBy('Employee_id', 'ASC')->get();

        return view('notifications.birthday', compact('list'));
    }
}
