<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Subject;

class Contact extends Model
{
    protected $fillable = ['subject_id', 'firstname', 'lastname', 'email', 'message'];

    public function subject()
    {
    	return $this->belongsTo(Subject::class);
    }
}
