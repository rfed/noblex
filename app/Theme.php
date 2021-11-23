<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Theme;

class Theme extends Model
{
    protected $fillable = ['name'];

    public function stories()
    {
    	return $this->hasMany(Story::class);
    }
}
