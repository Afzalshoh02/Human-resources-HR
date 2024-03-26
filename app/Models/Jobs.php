<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Jobs extends Model
{
    use HasFactory;
    protected $table = 'job';

    static public function getRecord($request)
    {
//        $return = self::select('users.*')
//            ->orderByDesc('id')
//            ->paginate(8);
//        return $return;
        $return = self::select('job.*');

        if (!empty(Request::get('id'))) {
            $return = $return->where('id', '=', Request::get('id'));
        }
        if (!empty(Request::get('job_title'))) {
            $return = $return->where('job_title', 'like', '%' . Request::get('job_title') . '%');
        }
        if (!empty(Request::get('min_salary'))) {
            $return = $return->where('min_salary', 'like', '%' . Request::get('min_salary') . '%');
        }
        if (!empty(Request::get('max_salary'))) {
            $return = $return->where('max_salary', 'like', '%' . Request::get('max_salary') . '%');
        }
        if (!empty(Request::get('start_date')) && !empty(Request::get('end_date'))) {
            $return = $return->where('job.created_at', '>=', Request::get('start_date'))
                ->where('job.created_at', '<=', Request::get('end_date'));
        }

        $return = $return->orderByDesc('id')->paginate(8);
        return $return;
    }
}
