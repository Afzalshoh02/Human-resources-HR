<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PositionExport;
use App\Http\Controllers\Backend\Controller;
use App\Models\Positions;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PositionsController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Positions::getRecord($request);
        return view('backend.position.list', $data);
    }

    public function position_export(Request $request)
    {
        return Excel::download(new PositionExport, 'Position.xlsx');
    }
    public function add()
    {
        return view('backend.position.add');
    }

    public function insert_post(Request $request)
    {
        $user = $request->validate([
            'position_name' =>  ['required'],
            'daily_rate' => ['required'],
            'monthly_rate' => ['required'],
            'working_days_per_month' => ['required'],
        ]);
        $user = new Positions();
        $user->position_name = trim($request->position_name);
        $user->daily_rate = trim($request->daily_rate);
        $user->monthly_rate = trim($request->monthly_rate);
        $user->working_days_per_month = trim($request->working_days_per_month);
        $user->save();
        return redirect('admin/position')->with('success', "Position Successfully ADD");
    }

    public function edit($id)
    {
        $data['getRecord'] = Positions::find($id);
        return view('backend.position.edit', $data);
    }

    public function edit_update(Request $request, $id)
    {
        $user = Positions::find($id);
        $user->position_name = trim($request->position_name);
        $user->daily_rate = trim($request->daily_rate);
        $user->monthly_rate = trim($request->monthly_rate);
        $user->working_days_per_month = trim($request->working_days_per_month);
        $user->save();
        return redirect('admin/position')->with('success', "Position Successfully Update");
    }

    public function delete($id)
    {
        $user = Positions::find($id);
        $user->delete();
        return redirect()->back()->with('error', "Record successfully delete");
    }
}
