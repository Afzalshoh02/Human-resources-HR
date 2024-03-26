<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobGradesController extends Controller
{
    public function index()
    {
        return view('backend.job_grades.list');
    }
}
