<?php

namespace App\Http\Controllers;

use App\Exports\CountriesExport;
use App\Models\Countries;
use App\Models\Regions;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CountriesController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = Countries::getRecord($request);
        return view('backend.countries.list', $data);
    }

    public function add(Request $request)
    {
        $data['getRegions'] = Regions::get();
        return view('backend.countries.add', $data);
    }

    public function add_post(Request $request)
    {
        $insert = $request->validate([
            'country_name' => ['required'],
            'regions_id' => ['required'],
        ]);
        $insert = new Countries();
        $insert->country_name = $request->country_name;
        $insert->regions_id = $request->regions_id;
        $insert->save();
        return redirect('admin/countries')->with('success', "Countries successfully add");
    }

    public function edit($id)
    {
        $data['getRecord'] = Countries::find($id);
        $data['getRegions'] = Regions::get();
        return view('backend.countries.edit', $data);
    }

    public function edit_post(Request $request, $id)
    {
        $insert = $request->validate([
            'country_name' => ['required'],
            'regions_id' => ['required'],
        ]);
        $insert = Countries::find($id);
        $insert->country_name = $request->country_name;
        $insert->regions_id = $request->regions_id;
        $insert->save();
        return redirect('admin/countries')->with('success', "Countries successfully update");
    }

    public function delete($id)
    {
        $deleteRecord = Countries::find($id);
        $deleteRecord->delete();
        return redirect()->back()->with('error', "Record successfully Delete");
    }

    public function countries_export()
    {
        return Excel::download(new CountriesExport, 'countries.xlsx');
    }
}
