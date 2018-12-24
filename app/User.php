<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'students';
    public $incrementing = false;
    protected $primaryKey = 'student_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'firstname',
        'lastname',
        'email',
        'semester',
        'years',
        'contact',
        'status_id',
        'degree_id',
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

    public function status() {
        return $this->belongsto('App\Status', 'status_id');
    }

    public function degree() {
        return $this->belongsto('App\Degree', 'degree_id');
    }

    public function faculty() {
        return $this->belongsto('App\Faculty', 'faculty_id');
    }

    public function major() {
        return $this->belongsto('App\Major', 'major_id');
    }

    public function research() {
        return $this->hasMany('App\Research', 'student_id');
    }

    public function bill() {
        return $this->hasMany('App\Bill', 'student_id');
    }
}
