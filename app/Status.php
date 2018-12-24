<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'status_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
        return $this->hasMany('App\User', 'status_id');
    }

    public function staff() {
        return $this->hasMany('App\Staff', 'status_id');
    }

    public function research() {
        return $this->hasMany('App\Research', 'status_id');
    }

    public function advisor() {
        return $this->hasMany('App\Advisor', 'status_id');
    }

    public function word() {
        return $this->hasMany('App\Word', 'status_id');
    }

    public function log_word() {
        return $this->hasMany('App\Log_Word', 'status_id');
    }

    public function pdf() {
        return $this->hasMany('App\PDF', 'status_id');
    }

    public function log_pdf() {
        return $this->hasMany('App\Log_PDF', 'status_id');
    }

    public function comment() {
        return $this->hasMany('App\Comment', 'status_id');
    }
}
