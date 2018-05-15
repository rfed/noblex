<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Template;

class Page extends Model
{
    protected $fillable = ['title', 'url', 'content', 'visible', 'footer', 'template_id'];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
