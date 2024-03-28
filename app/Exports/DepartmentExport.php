<?php

namespace App\Exports;

use App\Models\Countries;
use App\Models\Department;
use App\Models\JobHistory;
use App\Models\Jobs;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DepartmentExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return Department::getRecord($request);
    }
    protected $index = 0;

    public function map($user): array
    {
        $startDate = date('d-m-Y H:i A', strtotime($user->created_at));
        if ($user->manager_id = 1) {
            $manager_id = 'Vipul';
        } else {
            $manager_id = 'Dio';
        }
        return [
            ++$this->index,
            $user->id,
            $user->department_name,
            $manager_id,
            $user->street_address,
            $startDate,
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Department Name',
            'Manager Name',
            'Locations Name',
            'Created At',
        ];
    }
}
