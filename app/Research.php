<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $table = 'research';
    public $incrementing = false;
    protected $primaryKey = 'research_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'research_id',
        'research_code',
        'th_topic',
        'eng_topic',
        'wage_abs',
        'wage_ref',
        'student_id',
        'ab_status_id',
        're_status_id',
        'limit',
        'status_id',
        'advisor_id',
        'co_advisor_id',
        'ab_staff_id',
        're_staff_id',
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

    public function status() {
        return $this->belongsto('App\Status', 'status_id');
    }

    public function user() {
        return $this->belongsto('App\User', 'student_id');
    }

    public function staff() {
        return $this->belongsto('App\Staff', 'staff_id');
    }

    public function word() {
        return $this->hasMany('App\Word', 'research_id');
    }

    public function log_word() {
        return $this->hasMany('App\Log_Word', 'research_id');
    }

    public function pdf() {
        return $this->hasMany('App\PDF', 'research_id');
    }

    public function log_pdf() {
        return $this->hasMany('App\Log_PDF', 'research_id');
    }

    public function comment() {
        return $this->hasMany('App\Comment', 'research_id');
    }

    public function bill() {
        return $this->hasMany('App\Bill', 'research_id');
    }
}
