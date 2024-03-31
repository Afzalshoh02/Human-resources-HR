<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MyAccountController extends Controller
{
    public function my_account()
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('backend.my_account.update', $data);
    }

    public function edit_update(Request $request)
    {
        $user = $request->validate([
            'email' => 'required|unique:users,email,'.Auth::user()->id,
        ]);
        $user = User::find(Auth::user()->id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password)) {
            $user->password = trim($request->password);
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
        return redirect('admin/my_account')->with('success', "My Account Successfully Update !!!");
    }

    public function employees_my_account(Request $request)
    {
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('backend.employee.my_account.list', $data);
    }

    public function employees_my_account_update(Request $request)
    {
        $user = $request->validate([
            'email' => 'required|unique:users,email,'.Auth::user()->id,
        ]);
        $user = User::find(Auth::user()->id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password)) {
            $user->password = trim($request->password);
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
        return redirect('employees/my_account')->with('success', "My Account Successfully Update !!!");
    }
}
