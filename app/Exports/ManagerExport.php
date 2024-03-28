<?php

namespace App\Exports;

use App\Models\Countries;
use App\Models\JobHistory;
use App\Models\Jobs;
use App\Models\Manager;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ManagerExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return Manager::getRecord($request);
    }
    protected $index = 0;

    public function map($user): array
    {
        $startDate = date('d-m-Y H:i A', strtotime($user->created_at));
        return [
            ++$this->index,
            $user->id,
            $user->manager_name,
            $user->manager_email,
            $user->manager_mobile,
            $startDate,
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Manager Name',
            'Manager Email',
            'Manager Mobile',
            'Created Date',
        ];
    }
}
