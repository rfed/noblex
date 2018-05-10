<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Story;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function stories()
    {
    	return $this->hasMany(Story::class);
    }
}
