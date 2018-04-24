<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	protected $table = 'attributegroups';

	protected $fillable = ['name'];
}

