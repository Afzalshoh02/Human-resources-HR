<?php

namespace App\Http\Controllers\Backend;

use App\Exports\LocationExport;
use App\Models\Countries;
use App\Models\Locations;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LocationsController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Locations::getRecord($request);
        return view('backend.location.list', $data);
    }

    public function add()
    {
        $data['getCountries'] = Countries::get();
        return view('backend.location.add', $data);
    }

    public function add_post(Request $request)
    {
        $user = $request->validate([
            'street_address' => ['required'],
            'postal_code' => ['required'],
            'city' => ['required'],
            'state_provice' => ['required'],
            'countries_id' => ['required'],
        ]);
        $user = new Locations();
        $user->street_address = trim($request->street_address);
        $user->postal_code = trim($request->postal_code);
        $user->city = trim($request->city);
        $user->state_provice = trim($request->state_provice);
        $user->countries_id = trim($request->countries_id);
        $user->save();
        return redirect('admin/location')->with('success', "locations Successfully ADD");
    }

    public function edit($id)
    {
        $data['getRecord'] = Locations::find($id);
        $data['getCountries'] = Countries::get();
        return view('backend.location.edit', $data);
    }

    public function edit_update($id, Request $request)
    {
        $user = Locations::find($id);
        $user->street_address = trim($request->street_address);
        $user->postal_code = trim($request->postal_code);
        $user->city = trim($request->city);
        $user->state_provice = trim($request->state_provice);
        $user->countries_id = trim($request->countries_id);
        $user->save();
        return redirect('admin/location')->with('success', "Location Successfully Updated");
    }

    public function delete($id)
    {
        $user = Locations::find($id);
        $user->delete();
        return redirect()->back()->with('error', "Record Successfully Deleted");
    }

    public function location_export()
    {
        return Excel::download(new LocationExport, 'location_export.xlsx');
    }
}
