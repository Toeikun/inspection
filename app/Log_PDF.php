<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log_PDF extends Model
{
    protected $table = 'log_pdf';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'research_id',
        'filename',
        'filetype',
        'sent_date',
        'status_id',
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

    public function research() {
        return $this->belongsto('App\Research', 'research_id');
    }
}
