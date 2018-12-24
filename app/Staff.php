<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\StaffResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use Notifiable;
    protected $table = 'staffs';
    protected $guard = 'staff';
    public $incrementing = false;
    protected $primaryKey = 'staff_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'staff_id',
        'firstname',
        'lastname',
        'email',
        'contact',
        'regis_pass',
        'status_id',
        'position_id',
        'department_id',
        'permission_id',
        'faculty_id',
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
    public function sendPasswordResetNotification($token) {
        $this->notify(new StaffResetPasswordNotification($token));
    }

    public function status() {
        return $this->belongsto('App\Status', 'status_id');
    }

    public function position() {
        return $this->belongsto('App\Position', 'position_id');
    }

    public function department() {
        return $this->belongsto('App\Department', 'department_id');
    }

    public function permission() {
        return $this->belongsto('App\Permission', 'permission_id');
    }

    public function faculty() {
        return $this->belongsto('App\Faculty', 'faculty_id');
    }

    public function word() {
        return $this->hasMany('App\Word', 'staff_id');
    }

    public function pdf() {
        return $this->hasMany('App\PDF', 'staff_id');
    }

    public function comment() {
        return $this->hasMany('App\Comment', 'staff_id');
    }
}