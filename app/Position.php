<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'position';
    protected $primaryKey = 'position_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'position_id',
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

    public function staff() {
        return $this->hasMany('App\Staff', 'position_id');
    }

    public function advisor() {
        return $this->hasMany('App\Advisor', 'position_id');
    }
}
