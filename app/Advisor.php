<?php

namespace App;

use Illuminate\Notifications\Notifiable;
// use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Advisor extends Authenticatable
{
    use Notifiable;
    protected $table = 'advisors';
    protected $guard = 'advisor';
    public $incrementing = false;
    protected $primaryKey = 'advisor_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'advisor_id',
        'position_id',
        'firstname',
        'lastname',
        'email',
        'contact',
        'regis_pass',
        'status_id',
        'faculty_id',
        'major_id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function position() {
        return $this->belongsto('App\Position', 'position_id');
    }

    public function status() {
        return $this->belongsto('App\Status', 'status_id');
    }

    public function faculty() {
        return $this->belongsto('App\Faculty', 'faculty_id');
    }

    public function major() {
        return $this->belongsto('App\Major', 'major_id');
    }
}
