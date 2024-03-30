<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Payroll extends Model
{
    use HasFactory;

    protected $table = 'payrolls';

    static public function getRecord()
    {
//        $return = self::select('payrolls.*')
//            ->orderByDesc('id')
//            ->paginate(8);
//        return $return;
        $return = self::select('payrolls.*', 'users.name')
            ->join('users', 'users.id', '=', 'payrolls.employee_id')
            ->orderByDesc('id');
        if (!empty(Request::get('id'))) {
            $return = $return->where('payrolls.id', '=', Request::get('id'));
        }
        if (!empty(Request::get('employee_id'))) {
            $return = $return->where('users.name', 'like', '%'.Request::get('employee_id').'%');
        }
        if (!empty(Request::get('number_of_day_work'))) {
            $return = $return->where('payrolls.number_of_day_work', 'like', '%'.Request::get('number_of_day_work').'%');
        }
        if (!empty(Request::get('bonus'))) {
            $return = $return->where('payrolls.bonus', 'like', '%'.Request::get('bonus').'%');
        }
        if (!empty(Request::get('overtime'))) {
            $return = $return->where('payrolls.overtime', 'like', '%'.Request::get('overtime').'%');
        }
        $return = $return->paginate(8);
        return $return;
    }

    public function get_employee_name()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
