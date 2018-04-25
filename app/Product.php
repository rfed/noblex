<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;
use Noblex\Brand;
use Noblex\Attribute;
use Noblex\Category;
use Noblex\Feature;
use Noblex\ProductMedia;
use Noblex\ProductSection;
use Noblex\Relatedproduct;

class Product extends Model
{	
    protected $fillable = ["sku", "name", "brand_id", "category_id", "short_description", "description", "tag", "manual","featured", "active"];

    public function productsMedia()
    {
    	return $this->hasMany(ProductMedia::class)->orderBy('position', 'asc');
    }

    public function productsGallery()
    {
        return $this->hasMany(ProductMedia::class)->where('type', 'image')->orderBy('position', 'asc');        
    }

    public function thumb()
    {
        return $this->hasOne(ProductMedia::class)->where('type', 'image_thumb');
    }

    public function featuredImg()
    {
    	return $this->hasOne(ProductMedia::class)->where('featured', 1);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function features()
    {
    	return $this->belongsToMany(Feature::class)->withTimestamps();
    }

    public function relatedproducts()
    {
        return $this->belongsToMany(Product::class, 'relatedproducts', 'product_id', 'product_relationship_id')->withTimestamps();
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function sectionproducts()
    {
        return $this->hasMany(ProductSection::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_category_product', 'product_id', 'attribute_id');
    }

    public function attributesAll()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_category_product', 'product_id', 'attribute_id')->withPivot('value');
    }

    public function attributesWithGroup()
    {
        $atts = $this->attributes()->whereNotNull('attributegroup_id')->orderBy('attributegroup_id', 'asc')->withPivot('value','id')->get();
        $_arr = [];
        foreach($atts as $k => $att){
            $_arr[$att->group->id]['group'] = $att->group;
            $_arr[$att->group->id]['attributes'][] = $att;
        }

        return $_arr;
    }

    public function attributesWithoutGroup()
    {
        return $this->attributes()->select()->whereNull('attributegroup_id')->orderBy('attributegroup_id', 'asc')->withPivot('value','id')->get();
    }
}
