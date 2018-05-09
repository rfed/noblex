<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Subject;

class EmailSubject extends Model
{
    protected $table = 'email_subjects';
    protected $primaryKey  = ['subject_id', 'email'];
    public $incrementing = false;

    public function subjects()
    {
    	return $this->belongsTo(Subject::class);
    }
}
