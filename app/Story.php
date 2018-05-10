<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Story;

class Story extends Model
{
    protected $fillable = ['title', 'url', 'subtitle', 'content', 'image', 'visible', 'category_id'];

    public function tags()
    {
    	return $this->hasMany(Tag::class);
    }
}
