<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('backend.jobs.list');
    }

    public function add()
    {
        return view('backend.jobs.add');
    }
}
