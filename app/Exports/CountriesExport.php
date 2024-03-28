<?php

namespace App\Exports;

use App\Models\Countries;
use App\Models\JobHistory;
use App\Models\Jobs;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CountriesExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return Countries::getRecord($request);
    }
    protected $index = 0;

    public function map($user): array
    {
        $startDate = date('d-m-Y H:i A', strtotime($user->created_at));
        $endDate = date('d-m-Y H:i A', strtotime($user->updated_at));
        return [
            ++$this->index,
            $user->id,
            $user->country_name,
            $user->region_name,
            $startDate,
            $endDate,
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Country Name',
            'Region Name',
            'Created At',
            'Updated At',
        ];
    }
}
