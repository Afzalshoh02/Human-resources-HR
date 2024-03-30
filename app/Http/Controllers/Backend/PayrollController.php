<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PayrollExport;
use App\Models\Payroll;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PayrollController extends Controller
{
    public function index()
    {
        $data['getRecord'] = Payroll::getRecord();
        return view('backend.payroll.list', $data);
    }

    public function payroll_export()
    {
        return Excel::download(new PayrollExport, 'Payroll.xlsx');
    }
    public function add(Request $request)
    {
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();
        return view('backend.payroll.add', $data);
    }

    public function insert_payroll(Request $request)
    {
        $user = new Payroll();
        $user->employee_id = trim($request->employee_id);
        $user->number_of_day_work = trim($request->number_of_day_work);
        $user->bonus = trim($request->bonus);
        $user->overtime = trim($request->overtime);
        $user->gross_salary = trim($request->gross_salary);
        $user->cash_advance = trim($request->cash_advance);
        $user->late_hours = trim($request->late_hours);
        $user->absent_days = trim($request->absent_days);
        $user->sss_contribution = trim($request->sss_contribution);
        $user->philhealth = trim($request->philhealth);
        $user->total_deduction = trim($request->total_deduction);
        $user->netpay = trim($request->netpay);
        $user->payroll_monthly = trim($request->payroll_monthly);
        $user->save();
        return redirect('admin/payroll')->with('success', "Payroll successfully save");
    }

    public function view($id)
    {
        $data['getRecord'] = Payroll::find($id);
        return view('backend.payroll.view', $data);
    }

    public function edit(Request $request, $id)
    {
        $data['getRecord'] = Payroll::find($id);
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();
        return view('backend.payroll.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $user = Payroll::find($id);
        $user->employee_id = trim($request->employee_id);
        $user->number_of_day_work = trim($request->number_of_day_work);
        $user->bonus = trim($request->bonus);
        $user->overtime = trim($request->overtime);
        $user->gross_salary = trim($request->gross_salary);
        $user->cash_advance = trim($request->cash_advance);
        $user->late_hours = trim($request->late_hours);
        $user->absent_days = trim($request->absent_days);
        $user->sss_contribution = trim($request->sss_contribution);
        $user->philhealth = trim($request->philhealth);
        $user->total_deduction = trim($request->total_deduction);
        $user->netpay = trim($request->netpay);
        $user->payroll_monthly = trim($request->payroll_monthly);
        $user->save();
        return redirect('admin/payroll')->with('success', "Payroll successfully Updated");
    }

    public function delete($id)
    {
        $recordDelete = Payroll::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', "Record successfully Delete");
    }
}
