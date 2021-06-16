<?php

namespace App\Http\Controllers;

use App\Models\PR_Payroll;
use App\Models\PR_Employee;
use App\Models\HRM_Employee;

class NotificationController extends Controller
{
    public function benefit()
    {
        $list = HRM_Employee::where('benefits_old', '!=', 0)->get();

        return view('notifications.benefit', compact('list'));
    }

    public function daysoff()
    {
        $allowed = 3;
        $list = PR_Employee::where('VacationDays', '>', $allowed)->get();

        return view('notifications.daysoff', compact('list', 'allowed'));
    }

    public function fullyear()
    {
        $list = PR_Payroll::where('WorkingDays', '>=', 365)->get();
        $recruitment_list = [];
        foreach ($list as $item) {
            $id = $item->employee_id;
            $hrm_list = HRM_Employee::select('RecruitmentDate')->where('id', $id)->first();
            $recruitment_list[$id] = $hrm_list->RecruitmentDate;
        }

        return view('notifications.fullyear', compact('list', 'recruitment_list'));
    }

    public function birthday()
    {
        $list = HRM_Employee::whereMonth('Birthday', date_format(now(), "m"))->get();

        return view('notifications.birthday', compact('list'));
    }
}
