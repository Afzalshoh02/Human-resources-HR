<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Backend\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterviewController extends Controller
{
    public function Interview(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('backend.employee.interview.list', $data);
    }
}
