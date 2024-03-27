<?php

namespace App\Http\Controllers;

use App\Models\JobGrades;
use Illuminate\Http\Request;

class JobGradesController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = JobGrades::getRecord($request);
        return view('backend.job_grades.list', $data);
    }

    public function add(Request $request)
    {
        return view('backend.job_grades.add');
    }

    public function add_post(Request $request)
    {
        $user = $request->validate([
            'grade_level' => ['required'],
            'lowest_sal' => ['required'],
            'highest_sal' => ['required'],
        ]);
        $user = new JobGrades();
        $user->grade_level = trim($request->grade_level);
        $user->lowest_sal = trim($request->lowest_sal);
        $user->highest_sal = trim($request->highest_sal);
        $user->save();
        return redirect('admin/job_grades')->with('success', "Job Grades successfully Add");
    }

    public function edit($id)
    {
        $data['getRecord'] = JobGrades::find($id);
        return view('backend.job_grades.edit', $data);
    }

    public function edit_update(Request $request, $id)
    {
        $user = $request->validate([
            'grade_level' => ['required'],
            'lowest_sal' => ['required'],
            'highest_sal' => ['required'],
        ]);
        $user = JobGrades::find($id);
        $user->grade_level = trim($request->grade_level);
        $user->lowest_sal = trim($request->lowest_sal);
        $user->highest_sal = trim($request->highest_sal);
        $user->save();
        return redirect('admin/job_grades')->with('success', "Job Grades successfully Updated");
    }

    public function delete($id)
    {
        $user = JobGrades::find($id);
        $user->delete();
        return redirect()->back()->with('error', "Record Successfully Deleted");
    }
}
