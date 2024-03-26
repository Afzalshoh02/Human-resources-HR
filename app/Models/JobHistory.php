<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use function Termwind\renderUsing;

class JobHistory extends Model
{
    use HasFactory;
    protected $table = 'job_histories';

    static public function getRecord($request)
    {
//        $return = self::select('job_histories.*')
//            ->orderByDesc('id')
//            ->paginate(8);
//        return $return;
        $return = self::select('job_histories.*', 'users.name', 'job.job_title')
            ->join('users', 'users.id', '=', 'job_histories.employee_id')
            ->join('job', 'job.id', '=', 'job_histories.job_id')
            ->orderByDesc('job_histories.id');
        if (!empty(Request::get('id'))) {
            $return = $return->where('job_histories.id', '=', Request::get('id'));
        }
        if (!empty(Request::get('name'))) {
            $return = $return->where('users.name', 'like', '%'.Request::get('name').'%');
        }
        if (!empty(Request::get('start_date'))) {
            $return = $return->where('job_histories.start_date', '=', Request::get('start_date'));
        }
        if (!empty(Request::get('end_date'))) {
            $return = $return->where('job_histories.end_date', '=', Request::get('end_date'));
        }
        if (!empty(Request::get('job_title'))) {
            $return = $return->where('job.job_title', 'like', '%'.Request::get('job_title').'%');
        }
        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $return = $return->where('job_histories.start_date', '>=', Request::get('start_date'))
                                ->where('job_histories.end_date', '<=', Request::get('end_date'));
        }
        $return = $return->paginate(8);
        return $return;
    }

    public function get_user_name_single()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
    public function get_job_single()
    {
        return $this->belongsTo(Jobs::class, 'job_id');
    }
}
