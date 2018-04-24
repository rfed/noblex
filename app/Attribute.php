<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
	protected $fillable = ['name', 'attributegroup_id'];

}
