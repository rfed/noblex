<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;

class WidgetMedia extends Model
{
	public $timestamps = false;
	protected $fillable = ['widget_id', 'source', 'type', 'position', 'title', 'description', 'link'];
	protected $table = 'widgets_media';
}
