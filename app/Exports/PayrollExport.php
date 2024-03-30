<?php

namespace App\Exports;

use App\Models\Countries;
use App\Models\Department;
use App\Models\JobHistory;
use App\Models\Jobs;
use App\Models\Payroll;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PayrollExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return Payroll::getRecord($request);
    }
    protected $index = 0;

    public function map($user): array
    {
        $startDate = date('d-m-Y H:i A', strtotime($user->created_at));
        $endDate = date('d-m-Y H:i A', strtotime($user->updated_at));
        return [
            ++$this->index,
            $user->id,
            $user->name,
            $user->number_of_day_work,
            $user->bonus,
            $user->overtime,
            $user->gross_salary,
            $user->cash_advance,
            $user->late_hours,
            $user->absent_days,
            $user->sss_contribution,
            $user->philhealth,
            $user->total_deduction,
            $user->netpay,
            $user->payroll_monthly,
            $startDate,
            $endDate,
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Employee Name',
            'Number Of Day Work',
            'Bonus',
            'Overtime',
            'Gross Salary',
            'Cash Advance',
            'Late Hours',
            'Absent Days',
            'SSS Contribution',
            'Philhealth',
            'Total Deduction',
            'Netpay',
            'Payroll Monthly',
            'Created At',
            'Updated At',
        ];
    }
}
