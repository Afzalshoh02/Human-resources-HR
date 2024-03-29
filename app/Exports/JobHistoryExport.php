<?php

namespace App\Exports;

use App\Models\JobHistory;
use App\Models\Jobs;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class JobHistoryExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return JobHistory::getRecord($request);
    }
    protected $index = 0;

    public function map($user): array
    {
        $startDate = date('d-m-Y', strtotime($user->start_date));
        $endDate = date('d-m-Y', strtotime($user->end_date));
        $createdAtFormat = date('d-m-Y H:i A', strtotime($user->created_at));
        return [
            $user->id,
            $user->name . ' ' . $user->last_name,
            $startDate,
            $endDate,
            $user->job_title,
            $user->department_name,
            $createdAtFormat,
        ];
    }

    public function headings(): array
    {
        return [
            'Table ID',
            'Employee Name',
            'Start Date',
            'End Date',
            'Job Title',
            'Department ID',
            'Created At',
        ];
    }
}
