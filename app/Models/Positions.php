<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Positions extends Model
{
    use HasFactory;

    protected $table = 'positions';

    static public function getRecord($request)
    {
        $return = self::select('positions.*')
            ->orderByDesc('id');
        if (!empty($request->id)) {
            $return = $return->where('positions.id', '=', Request::get('id'));
        }
        if (!empty($request->position_name)) {
            $return = $return->where('positions.position_name', 'like', '%'.Request::get('position_name').'%');
        }
        if (!empty($request->daily_rate)) {
            $return = $return->where('positions.daily_rate', 'like', '%'.Request::get('daily_rate').'%');
        }
        if (!empty($request->monthly_rate)) {
            $return = $return->where('positions.monthly_rate', 'like', '%'.Request::get('monthly_rate').'%');
        }
        if (!empty($request->working_days_per_month)) {
            $return = $return->where('positions.working_days_per_month', 'like', '%'.Request::get('working_days_per_month').'%');
        }
        $return = $return->paginate(8);
        return $return;
    }
}
