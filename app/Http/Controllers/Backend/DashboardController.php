<?php

namespace App\Http\Controllers\Backend;

use App\Models\Countries;
use App\Models\Department;
use App\Models\JobHistory;
use App\Models\Jobs;
use App\Models\Locations;
use App\Models\Manager;
use App\Models\Payroll;
use App\Models\Positions;
use App\Models\Regions;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->is_role == 1) {

            $data['getEmployeeCount'] = User::count();
            $data['getHRCount'] = User::where('is_role', '=', 1)->count();
            $data['getEMCount'] = User::where('is_role', '=', 0)->count();
            $data['getTotalJobCount'] = Jobs::count();
            $data['geJobHCount'] = JobHistory::count();
            $data['getRegionsCount'] = Regions::count();
            $data['TodayRegion'] = Regions::whereDate('created_at', Carbon::today())->count();
            $data['YesterdayRegion'] = Regions::whereDate('created_at', Carbon::yesterday())->count();
            $data['geCountriesCount'] = Countries::count();
            $data['getLocationCount'] = Locations::count();
            $data['getDepartmentCount'] = Department::count();
            $data['getManagerCount'] = Manager::count();
            $data['getPayrollCount'] = Payroll::count();
            $data['getPositionCount'] = Positions::count();
            return view('backend.dashboard.list', $data);

        } else if (Auth::user()->is_role == 0) {
            return view('backend.employee.dashboard.list');
        }
    }
}
