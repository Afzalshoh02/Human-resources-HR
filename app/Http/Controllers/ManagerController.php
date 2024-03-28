<?php

namespace App\Http\Controllers;

use App\Exports\ManagerExport;
use App\Models\Manager;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ManagerController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Manager::getRecord($request);
        return view('backend.manager.list', $data);
    }

    public function add()
    {
        return view('backend.manager.add');
    }

    public function add_post(Request $request)
    {
        $user = $request->validate([
           'manager_name' => ['required', 'unique:managers'],
           'manager_email' => ['required'],
           'manager_mobile' => ['required'],
        ]);
        $user = new Manager();
        $user->manager_name = trim($request->manager_name);
        $user->manager_email = trim($request->manager_email);
        $user->manager_mobile = trim($request->manager_mobile);
        $user->save();
        return redirect('admin/manager')->with('success', "Manager successfully add");
    }

    public function edit($id, Request $request)
    {
        $data['getRecord'] = Manager::find($id);
        return view('backend.manager.edit', $data);
    }

    public function edit_post(Request $request, $id)
    {
        $user = Manager::find($id);
        $user->manager_name = trim($request->manager_name);
        $user->manager_email = trim($request->manager_email);
        $user->manager_mobile = trim($request->manager_mobile);
        $user->save();
        return redirect('admin/manager')->with('success', "Manager successfully Update");
    }

    public function delete($id)
    {
        $user = Manager::find($id);
        $user->delete();
        return redirect()->back()->with('error', "Record successfully delete");
    }

    public function manager_export()
    {
        return Excel::download(new ManagerExport, 'manager.xlsx');
    }
}
