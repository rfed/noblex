<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
	protected $fillable = ['name', 'attributegroup_id'];

	public function group()
    {
    	return $this->belongsTo(Group::class, 'attributegroup_id');
	}
	
	public static function AllbyGroup(){
		$atts = Attribute::whereNotNull('attributegroup_id')->get();
        $_arr = [];
        foreach($atts as $k => $att ){
            $_arr[$att->group->id]['group'] = $att->group;
            $_arr[$att->group->id]['attributes'][] = $att;
        }
		
        return $_arr;
	}

	public static function DifferentbyGroup($ids){
		$atts = Attribute::whereNotNull('attributegroup_id')->whereNotIn('id', $ids)->get();
        $_arr = [];
        foreach($atts as $k => $att ){
			$_arr[$att->group->id]['group'] = $att->group;
            $_arr[$att->group->id]['attributes'][] = $att;
        }
		
        return $_arr;
	}

}
