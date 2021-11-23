<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Story;

class Story extends Model
{
    protected $fillable = ['title', 'url', 'subtitle', 'content', 'theme_id' ,'image', 'visible'];

    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }
}
