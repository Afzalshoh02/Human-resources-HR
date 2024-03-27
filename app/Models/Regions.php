<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Regions extends Model
{
    use HasFactory;

    protected $table = 'regions';

    static public function getRecord($request)
    {
        $return = self::select('regions.*')
            ->orderByDesc('id');
        if (!empty(Request::get('id'))) {
            $return = $return->where('id', '=', Request::get('id'));
        }
        if (!empty(Request::get('region_name'))) {
            $return = $return->where('region_name', 'like', '%'.Request::get('region_name').'%');
        }
        $return = $return->paginate(8);
        return $return;
    }
}
