<?php

namespace App\Http\Controllers\Backend;

use App\Exports\JobsExport;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Jobs::getRecord($request);
        return view('backend.jobs.list', $data);
    }

    public function add()
    {
        return view('backend.jobs.add');
    }

    public function add_post(Request $request)
    {
        $user = $request->validate([
           'job_title' => ['required'],
           'min_salary' => ['required'],
           'max_salary' => ['required'],
        ]);
        $user = new Jobs();
        $user->job_title = trim($request->job_title);
        $user->min_salary = trim($request->min_salary);
        $user->max_salary = trim($request->max_salary);
        $user->save();
        return redirect('admin/jobs')->with('success', "Jobs successfully Register");
    }

    public function view(Request $request, $id)
    {
        $data['getRecord'] = Jobs::find($id);
        return view('backend.jobs.view', $data);
    }

    public function edit($id)
    {
        $data['getRecord'] = Jobs::find($id);
        return view('backend.jobs.edit', $data);
    }

    public function edit_update($id, Request $request)
    {
        $user = $request->validate([
            'job_title' => ['required'],
            'min_salary' => ['required'],
            'max_salary' => ['required'],
        ]);
        $user = Jobs::find($id);
        $user->job_title = trim($request->job_title);
        $user->min_salary = trim($request->min_salary);
        $user->max_salary = trim($request->max_salary);
        $user->save();
        return redirect('admin/jobs')->with('success', "Jobs successfully Update");
    }

    public function delete($id)
    {
        $recordDelete = Jobs::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', "Record successfully Deleted");
    }

    public function job_export()
    {
        return Excel::download(new JobsExport, 'jobs.xlsx');
    }
}
