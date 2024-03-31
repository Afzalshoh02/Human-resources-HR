<?php

namespace App\Http\Controllers\Backend;

use App\Mail\EmployeeNewCreateEmail;
use App\Models\Department;
use App\Models\Jobs;
use App\Models\Manager;
use App\Models\Positions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmployeesController extends Controller
{
    public function index()
    {
        $data['getRecord'] = User::getRecord();
        return view('backend.employees.list', $data);
    }

    public function image_delete(Request $request, $id)
    {
        $deleteRecord = User::find($id);
        $deleteRecord->profile_image = $request->profile_image;
        $deleteRecord->save();
        return redirect()->back()->with('error', "Record Image Deleted");
    }
    public function add(Request $request)
    {
        $data['getPosition'] = Positions::get();
        $data['getJobs'] = Jobs::get();
        $data['getManager'] = Manager::get();
        $data['getDepartment'] = Department::get();
        return view('backend.employees.add', $data);
    }

    public function add_post(Request $request)
    {
        $user = $request->validate([
           'name' => ['required'],
           'password' => ['required'],
           'email' => ['required', 'unique:users'],
           'hire_date' => ['required'],
           'job_id' => ['required'],
           'salary' => ['required'],
           'commission_pct' => ['required'],
           'department_id' => ['required'],
        ]);
        $user = new User();
        $user->name = trim($request->name);
//        $user->password = Hash::make($request->password);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id = trim($request->department_id);
        $user->position_id = trim($request->position_id);
        $user->is_role = 0; //0 - Employees
        $random_password = $request->password;
        $user->password = Hash::make($random_password);
        if (!empty($request->file('profile_image'))) {
            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $fileName = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/', $fileName);
            $user->profile_image = $fileName;
        }
        $user->save();
        $user->random_password = $random_password;
        Mail::to($user->email)->send(new EmployeeNewCreateEmail($user));
        return redirect('admin/employees')->with('success', "Employees successfully register.");
    }

    public function view($id)
    {
        $data['getRecord'] = User::find($id);
        return view('backend.employees.view', $data);
    }

    public function edit($id)
    {
        $data['getPosition'] = Positions::get();
        $data['getRecord'] = User::find($id);
        $data['getJobs'] = Jobs::get();
        $data['getManager'] = Manager::get();
        $data['getDepartment'] = Department::get();
        return view('backend.employees.edit', $data);
    }

    public function edit_update($id, Request $request)
    {
        $user = $request->validate([
            'email' => ['required', 'unique:users,email,'.$id]
        ]);
        $user = User::find($id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id = trim($request->department_id);
        $user->position_id = trim($request->position_id);
        $user->is_role = 0; //0 - Employees
        $user->interview = $request->interview;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        if (!empty($request->file('profile_image'))) {
            if (!empty($user->profile_image) && file_exists('upload/'.$user->profile_image)) {
                unlink('upload/'.$user->profile_image);
            }
            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $fileName = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/', $fileName);
            $user->profile_image = $fileName;
        }
        $user->save();
        return redirect('admin/employees')->with('success', "Employees successfully Updated.");
    }

    public function delete($id)
    {
        $recordDelete = User::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', "Record successfully deleted");
    }
}
