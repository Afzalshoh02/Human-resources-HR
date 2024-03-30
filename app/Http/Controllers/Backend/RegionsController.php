<?php

namespace App\Http\Controllers\Backend;

use App\Models\Regions;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Regions::getRecord($request);
        return view('backend.regions.list', $data);
    }

    public function add()
    {
        return view('backend.regions.add');
    }

    public function add_post(Request $request)
    {
        $user = $request->validate([
            'region_name' => ['required']
        ]);
        $user = new Regions();
        $user->region_name = trim($request->region_name);
        $user->save();
        return redirect('admin/regions')->with('success', "Regions successfully add");
    }

    public function edit($id, Request $request)
    {
        $data['getRecord'] = Regions::find($id);
        return view('backend.regions.edit', $data);
    }

    public function update_edit(Request $request, $id)
    {
        $user = $request->validate([
            'region_name' => ['required']
        ]);
        $user = Regions::find($id);
        $user->region_name = trim($request->region_name);
        $user->save();
        return redirect('admin/regions')->with('success', "Regions successfully Updated");
    }

    public function delete($id)
    {
        $delete_user = Regions::find($id);
        $delete_user->delete();
        return redirect()->back()->with('error', "Regions successfully Deleted");
    }
}
