<?php

namespace App\Http\Controllers;

use App\Models\PR_Employee;
use App\Models\HRM_Employee;
use Illuminate\Http\Request;
use App\Models\HRM_Department;

class UserController extends Controller
{
    public function index()
    {
        $list = HRM_Employee::all();

        return view('users.index', compact('list'));
    }

    public function create()
    {
        $departments = HRM_Department::all();

        return view('users.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:45',
            'lastname' => 'required|string|max:45',
            'email' => 'required|email|max:45|unique:employees,email',
            'birthday' => 'required|date',
            'gender' => 'required|numeric|between:0,1',
            'address' => 'required|string',
            'phonenumber' => 'required|string|max:13',
            'ethnicity' => 'required|string|max:45',
            'recruitmentdate' => 'required|date',
            'department_id' => 'required|integer',
        ]);
        $request = $request->only([
            'firstname', 'lastname', 'email', 'birthday', 'gender', 'address', 'phonenumber', 'ethnicity', 'recruitmentdate', 'department_id',
        ]);
        if ($request != null) {
            $firstname = $request['firstname'];
            $lastname = $request['lastname'];
            $email = $request['email'];
            $birthday = date('Y-m-d', strtotime($request['birthday']));
            $gender = $request['gender'];
            $address = $request['address'];
            $phonenumber = $request['phonenumber'];
            $ethnicity = $request['ethnicity'];
            $recruitmentdate = date('Y-m-d H:i:s.v', strtotime($request['recruitmentdate']));
            $department = $request['department_id'];
            HRM_Employee::create([
                'FirstName' => $firstname,
                'LastName' => $lastname,
                'Email' => $email,
                'Birthday' => $birthday,
                'Gender' => $gender,
                'Address' => $address,
                'PhoneNumber' => $phonenumber,
                'Ethnicity' => $ethnicity,
                'RecruitmentDate' => $recruitmentdate,
                'department_id' => $department,
            ]);
            PR_Employee::create([
                'FirstName' => $firstname,
                'LastName' => $lastname,
            ]);

            return redirect()->back()->with('message', 'Created!');
        }

        return redirect()->back()->with('message', 'Error!');
    }

    public function edit($id)
    {
        $employee = HRM_Employee::find($id);
        $departments = HRM_Department::all();
        if ($employee != null) {
            return view('users.edit', compact('employee', 'departments'));
        }
        echo "<script>window.location.href='".route('users.index')."';alert('Employee not found!');</script>";
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:45',
            'lastname' => 'required|string|max:45',
            'email' => 'required|email|max:45|unique:employees,email,'.$id,
            'birthday' => 'required|date',
            'gender' => 'required|integer|between:0,1',
            'address' => 'required|string',
            'phonenumber' => 'required|string|max:13',
            'ethnicity' => 'required|string|max:45',
            'recruitmentdate' => 'required|date',
            'department_id' => 'required|integer',
        ]);
        $request = $request->only([
            'firstname', 'lastname', 'email', 'birthday', 'gender', 'address', 'phonenumber', 'ethnicity', 'recruitmentdate', 'department_id',
        ]);
        $hrm_employee = HRM_Employee::where('id', $id);
        $pr_employee = PR_Employee::where('id', $id);
        if ($request != null && $hrm_employee->count() != 0 && $pr_employee->count() != 0) {
            $firstname = $request['firstname'];
            $lastname = $request['lastname'];
            $email = $request['email'];
            $birthday = date('Y-m-d', strtotime($request['birthday']));
            $gender = $request['gender'];
            $address = $request['address'];
            $phonenumber = $request['phonenumber'];
            $ethnicity = $request['ethnicity'];
            $recruitmentdate = date('Y-m-d H:i:s.v', strtotime($request['recruitmentdate']));
            $department = $request['department_id'];
            $hrm_employee->update([
                'FirstName' => $firstname,
                'LastName' => $lastname,
                'Email' => $email,
                'Birthday' => $birthday,
                'Gender' => $gender,
                'Address' => $address,
                'PhoneNumber' => $phonenumber,
                'Ethnicity' => $ethnicity,
                'RecruitmentDate' => $recruitmentdate,
                'department_id' => $department,
            ]);
            $pr_employee->update([
                'FirstName' => $firstname,
                'LastName' => $lastname,
            ]);

            return redirect()->back()->with('message', 'Updated!');
        }

        return redirect()->back()->with('message', 'Error!');
    }

    public function destroy($id)
    {
        HRM_Employee::destroy($id);
        PR_Employee::destroy($id);
        echo "<script>window.location.href='".route('users.index')."';alert('Deleted!');</script>";
    }
}
