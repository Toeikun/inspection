<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculty';
    protected $primaryKey = 'faculty_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'faculty_id',
        'name',
        'note',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    public function user() {
        return $this->hasMany('App\User', 'faculty_id');
    }

    public function advisor() {
        return $this->hasMany('App\Advisor', 'faculty_id');
    }

    public function staff() {
        return $this->hasMany('App\Staff', 'faculty_id');
    }
}
