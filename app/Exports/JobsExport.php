<?php

namespace App\Exports;

use App\Models\Jobs;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class JobsExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return Jobs::getRecord($request);
    }
    protected $index = 0;

    public function map($user): array
    {
        $createdAtFormat = date('d-m-Y', strtotime($user->created_at));
        return [
            ++$this->index,
            $user->id,
            $user->job_title,
            $user->min_salary,
            $user->max_salary,
            $createdAtFormat,
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Job Title',
            'Min Salary',
            'Max Salary',
            'Created At',
        ];
    }
}
