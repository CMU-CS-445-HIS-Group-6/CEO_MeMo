<?php

namespace App\Http\Controllers;

use App\Models\PR_Employee;
use App\Models\HRM_Personal;
use Illuminate\Http\Request;
use App\Models\HRM_Employment;

class UserController extends Controller
{
    public function index()
    {
        $list = HRM_Personal::all();

        return view('users.index', compact('list'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:45',
            'lastname' => 'required|string|max:45',
            'email' => 'required|email|max:45|unique:\App\Models\HRM_Personal,email',
            'birthday' => 'required|date',
            'gender' => 'required|integer|between:0,1',
            'address' => 'required|string',
            'phonenumber' => 'required|string|max:13',
            'ethnicity' => 'required|string|max:45',
            'shareholder_status' => 'required|integer|between:0,1',
            'hiredate' => 'required|date',
        ]);
        $request = $request->only([
            'id', 'firstname', 'lastname', 'email', 'birthday', 'gender', 'address', 'phonenumber', 'ethnicity', 'shareholder_status', 'hiredate',
        ]);
        if ($request != null) {
            $id = $request['id'];
            $firstname = $request['firstname'];
            $lastname = $request['lastname'];
            $email = $request['email'];
            $birthday = date('Y-m-d', strtotime($request['birthday']));
            $gender = $request['gender'];
            $address = $request['address'];
            $phonenumber = $request['phonenumber'];
            $ethnicity = $request['ethnicity'];
            $shareholder_status = $request['shareholder_status'];
            $hiredate = date('Y-m-d H:i:s.v', strtotime($request['hiredate']));
            HRM_Personal::create([
                'Employee_ID' => $id,
                'First_Name' => $firstname,
                'Last_Name' => $lastname,
                'Email' => $email,
                'Birthday' => $birthday,
                'Gender' => $gender,
                'Address1' => $address,
                'Phone_Number' => $phonenumber,
                'Ethnicity' => $ethnicity,
                'Shareholder_Status' => $shareholder_status,
            ]);
            HRM_Employment::create([
                'Employee_ID' => $id,
                'Hire_Date' => $hiredate,
            ]);
            PR_Employee::create([
                'idEmployee' => $id,
                'FirstName' => $firstname,
                'LastName' => $lastname,
                'VacationDays' => 0,
                'PaidToDays' => 0,
                'PaidLastYear' => 0,
            ]);

            return redirect()->back()->with('message', 'Created!');
        }

        return redirect()->back()->with('message', 'Error!');
    }

    public function edit($id)
    {
        $employee = HRM_Personal::find($id);
        if ($employee != null) {
            return view('users.edit', compact('employee'));
        }
        echo "<script>window.location.href='".route('users.index')."';alert('Employee not found!');</script>";
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:45',
            'lastname' => 'required|string|max:45',
            'email' => 'required|email|max:45|unique:\App\Models\HRM_Personal,email,'.$id.',Employee_ID',
            'birthday' => 'required|date',
            'gender' => 'required|integer|between:0,1',
            'address' => 'required|string',
            'phonenumber' => 'required|string|max:13',
            'ethnicity' => 'required|string|max:45',
            'shareholder_status' => 'required|integer|between:0,1',
            'hiredate' => 'required|date',
        ]);
        $request = $request->only([
            'firstname', 'lastname', 'email', 'birthday', 'gender', 'address', 'phonenumber', 'ethnicity', 'shareholder_status', 'hiredate',
        ]);
        $hrm_personal = HRM_Personal::where('Employee_ID', $id);
        $hrm_employment = HRM_Employment::where('Employee_ID', $id);
        $pr_employee = PR_Employee::where('idEmployee', $id);
        if ($request != null && $hrm_personal->count() != 0 && $pr_employee->count() != 0) {
            $firstname = $request['firstname'];
            $lastname = $request['lastname'];
            $email = $request['email'];
            $birthday = date('Y-m-d', strtotime($request['birthday']));
            $gender = $request['gender'];
            $address = $request['address'];
            $phonenumber = $request['phonenumber'];
            $ethnicity = $request['ethnicity'];
            $shareholder_status = $request['shareholder_status'];
            $hiredate = date('Y-m-d H:i:s.v', strtotime($request['hiredate']));
            $hrm_personal->update([
                'First_Name' => $firstname,
                'Last_Name' => $lastname,
                'Email' => $email,
                'Birthday' => $birthday,
                'Gender' => $gender,
                'Address1' => $address,
                'Phone_Number' => $phonenumber,
                'Ethnicity' => $ethnicity,
                'Shareholder_Status' => $shareholder_status,
            ]);
            $hrm_employment->update([
                'Hire_Date' => $hiredate,
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
        HRM_Employment::where('Employee_ID', $id)->delete();
        HRM_Personal::where('Employee_ID', $id)->delete();
        PR_Employee::where('idEmployee', $id)->delete();
        echo "<script>window.location.href='".route('users.index')."';alert('Deleted!');</script>";
    }
}
