<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = ['name', 'email'];

    public function setNameAttribute($name)
    {
    	$this->attributes['name'] = ucwords($name);
    }
}
