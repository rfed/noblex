<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\EmailSubject;

class Subject extends Model
{
    public function email_subjects()
    {
    	return $this->hasMany(EmailSubject::class);
    }
}
