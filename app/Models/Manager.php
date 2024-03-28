<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Manager extends Model
{
    use HasFactory;

    protected $table = 'managers';

    static public function getRecord($request)
    {
        $return = self::select('managers.*')
            ->orderByDesc('managers.id');
        if (!empty(Request::get('id'))) {
            $return = $return->where('managers.id', '=', Request::get('id'));
        }
        if (!empty(Request::get('manager_name'))) {
            $return = $return->where('managers.manager_name', 'like', '%'.Request::get('manager_name').'%');
        }
        if (!empty(Request::get('manager_email'))) {
            $return = $return->where('managers.manager_email', 'like', '%'.Request::get('manager_email').'%');
        }
        if (!empty(Request::get('manager_mobile'))) {
            $return = $return->where('managers.manager_mobile', 'like', '%'.Request::get('manager_mobile').'%');
        }
        if (!empty(Request::get('start_date')) && !empty(Request::get('end_data'))) {
            $return = $return->where('managers.created_at', '>=', Request::get('start_date'))
                ->where('managers.created_at', '<=', Request::get('end_date'));
        }
        $return = $return->paginate(8);
        return $return;
    }
}
