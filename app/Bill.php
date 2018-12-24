<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bill_id',
        'name',
        'research_id',
        'times',
        'student_id',
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
        return $this->belongsto('App\User', 'student_id');
    }


    public function research() {
        return $this->belongsto('App\Research', 'research_id');
    }
}
