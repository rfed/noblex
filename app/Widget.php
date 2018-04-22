<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\WidgetMedia;
use Noblex\Product;

class Widget extends Model
{	
    public $timestamps = false;
    protected $fillable = ['title', 'description', 'btn_text', 'url', 'category_id', 'position', 'type', 'active', 'show_prods'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function media(){
        return $this->hasMany(WidgetMedia::class);
    }

    public function productos(){
        return $this->category ? Product::where('category_id', $this->category->id)->where('featured', 1)->get() : null;
    }

    public function types(){
        return \Config::get('widgets.types');
    }
}
