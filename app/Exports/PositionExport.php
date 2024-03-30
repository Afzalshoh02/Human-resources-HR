<?php

namespace App\Exports;

use App\Models\Countries;
use App\Models\Department;
use App\Models\JobHistory;
use App\Models\Jobs;
use App\Models\Payroll;
use App\Models\Positions;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PositionExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return Positions::getRecord($request);
    }
    protected $index = 0;

    public function map($user): array
    {
        $startDate = date('d-m-Y H:i A', strtotime($user->created_at));
        $endDate = date('d-m-Y H:i A', strtotime($user->updated_at));
        return [
            ++$this->index,
            $user->id,
            $user->position_name,
            $user->daily_rate,
            $user->monthly_rate,
            $user->working_days_per_month,
            $startDate,
            $endDate,
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Position Name',
            'Daily Rate',
            'Monthly Rate',
            'Working Days Per Month',
            'Created At',
            'Updated At',
        ];
    }
}
