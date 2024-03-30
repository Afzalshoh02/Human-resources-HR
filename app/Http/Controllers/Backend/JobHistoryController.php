<?php

namespace App\Http\Controllers\Backend;

use App\Exports\JobHistoryExport;
use App\Models\Department;
use App\Models\JobHistory;
use App\Models\Jobs;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JobHistoryController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = JobHistory::getRecord($request);
        return view('backend.job_history.list', $data);
    }

    public function add()
    {
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();
        $data['getDepartment'] = Department::get();
        $data['getJobs'] = Jobs::get();
        return view('backend.job_history.add', $data);
    }

    public function add_post(Request $request)
    {
        $user = $request->validate([
            'employee_id' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'job_id' => ['required'],
            'department_id' => ['required'],
        ]);
        $user = new JobHistory();
        $user->employee_id = trim($request->employee_id);
        $user->start_date = trim($request->start_date);
        $user->end_date = trim($request->end_date);
        $user->job_id = trim($request->job_id);
        $user->department_id = trim($request->department_id);
        $user->save();
        return redirect('admin/job_history')->with('success', "Job History successfully add");
    }
    public function edit($id)
    {
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();
        $data['getJobs'] = Jobs::get();
        $data['getDepartment'] = Department::get();
        $data['getRecord'] = JobHistory::find($id);
        return view('backend.job_history.edit', $data);
    }

    public function edit_update($id, Request $request)
    {
        $user = JobHistory::find($id);
        $user->employee_id = trim($request->employee_id);
        $user->start_date = trim($request->start_date);
        $user->end_date = trim($request->end_date);
        $user->job_id = trim($request->job_id);
        $user->department_id = trim($request->department_id);
        $user->save();
        return redirect('admin/job_history')->with('success', "Job History successfully update");
    }

    public function delete($id)
    {
        $user = JobHistory::find($id);
        $user->delete();
        return redirect()->back()->with('error', "Record successfully deleted");
    }

    public function job_history_export()
    {
        return Excel::download(new JobHistoryExport, 'job_history.xlsx');
    }
}
