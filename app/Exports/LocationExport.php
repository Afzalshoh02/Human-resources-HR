<?php

namespace App\Exports;

use App\Models\Countries;
use App\Models\JobHistory;
use App\Models\Jobs;
use App\Models\Locations;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LocationExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return Locations::getRecord($request);
    }
    protected $index = 0;

    public function map($user): array
    {
        $startDate = date('d-m-Y H:i A', strtotime($user->created_at));
        return [
            ++$this->index,
            $user->id,
            $user->street_address,
            $user->postal_code,
            $user->city,
            $user->state_provice,
            $user->country_name,
            $startDate,
        ];
    }

    public function headings(): array
    {
        return [
            'S.No',
            'Table ID',
            'Street Address',
            'Postal Code',
            'City',
            'State Provice',
            'Countries Name',
            'Created At',
        ];
    }
}
