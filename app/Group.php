<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	protected $table = 'attributegroups';

	protected $fillable = ['name'];

	public function attributes(){
		return $this->hasMany(Attribute::class, 'attributegroup_id');
	}
}

