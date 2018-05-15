<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Page;

class Template extends Model
{
    protected $fillable = ['name', 'reference'];

    public function pages()
    {
    	return $this->hasMany(Page::class);
    }
}
