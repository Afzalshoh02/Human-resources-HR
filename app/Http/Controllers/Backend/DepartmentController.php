<?php

namespace App\Http\Controllers\Backend;

use App\Exports\DepartmentExport;
use App\Models\Department;
use App\Models\Locations;
use App\Models\Manager;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Department::getRecord($request);
        return view('backend.department.list', $data);
    }

    public function add(Request $request)
    {
        $data['getLocation'] = Locations::get();
        $data['getManager'] = Manager::get();
        return view('backend.department.add', $data);
    }

    public function add_post(Request $request)
    {
        $user = $request->validate([
            'department_name' => ['required'],
            'manager_id' => ['required'],
            'locations_id' => ['required'],
        ]);
        $user = new Department();
        $user->department_name = trim($request->department_name);
        $user->manager_id = trim($request->manager_id);
        $user->locations_id = trim($request->locations_id);
        $user->save();
        return redirect('admin/department')->with('success', "Department successfully add");
    }

    public function edit($id, Request $request)
    {
        $data['getManager'] = Manager::get();
        $data['getRecord'] = Department::find($id);
        $data['getLocation'] = Locations::get();
        return view('backend.department.edit', $data);
    }

    public function edit_post($id, Request $request)
    {
        $user = Department::find($id);
        $user->department_name = trim($request->department_name);
        $user->manager_id = trim($request->manager_id);
        $user->locations_id = trim($request->locations_id);
        $user->save();
        return redirect('admin/department')->with('success', "Department Successfully Updated");
    }

    public function delete($id)
    {
        $user = Department::find($id);
        $user->delete();
        return redirect()->back()->with('error', "Record Successfully Deleted");
    }

    public function department_export(Request $request)
    {
        return Excel::download(new DepartmentExport, 'department.xlsx');
    }
}
