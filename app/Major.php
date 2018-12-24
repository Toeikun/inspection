<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $table = 'major';
    protected $primaryKey = 'major_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'major_id',
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
        return $this->hasMany('App\User', 'major_id');
    }

    public function advisor() {
        return $this->hasMany('App\Advisor', 'major_id');
    }
}
