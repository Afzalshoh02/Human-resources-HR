<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Laravel\Sanctum\HasApiTokens;
use function Termwind\renderUsing;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    static public function getRecord()
    {
//        $return = self::select('users.*')
//            ->orderByDesc('id')
//            ->paginate(8);
//        return $return;
        $return = self::select('users.*');

        if (!empty(Request::get('id'))) {
            $return = $return->where('id', '=', Request::get('id'));
        }
        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%'.Request::get('name').'%');
        }
        if (!empty(Request::get('last_name'))) {
            $return = $return->where('last_name', 'like', '%'.Request::get('last_name').'%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%'.Request::get('email').'%');
        }

        $return = $return->orderByDesc('id')->paginate(8);
        return $return;
    }

    public function get_job_single()
    {
        return $this->belongsTo(Jobs::class, "job_id");
    }

    public function get_manager_name_single()
    {
        return $this->belongsTo(Manager::class, 'manager_id');
    }

    public function get_departments_name_single()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function get_position_name_single()
    {
        return $this->belongsTo(Positions::class, 'position_id');
    }
}
