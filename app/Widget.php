<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\WidgetMedia;
use Noblex\Product;

class Widget extends Model
{	
    public $timestamps = false;
    protected $fillable = [
        'title', 
        'description', 
        'btn_text', 
        'url', 
        'category_id', 
        'position', 
        'type', 
        'active', 
        'show_prods', 
        'features',
        'home'
    ];

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


	public function getSorted(){
		return orderBy('position', 'asc')->get();
    }
    
	public static function getHome(){
        return Widget::where('home', 1)
            ->where('active', 1)
            ->orderBy('position', 'asc')->get();
    }
    
    public function getMediaSorted(){
        return $this->media()->orderBy('position', 'asc')->get();
	}
}
