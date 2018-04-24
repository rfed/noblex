<?php

namespace Noblex;

use Illuminate\Database\Eloquent\Model;

class WidgetMedia extends Model
{
	public $timestamps = false;
	protected $fillable = ['widget_id', 'source', 'type', 'position', 'title', 'description', 'link', 'subtitle'];
	protected $table = 'widgets_media';

	public function linkUrl(){
		$link = '#';

		if($this->link){
			$linkArr = explode('|', $this->link);
			$link = ($linkArr && count($linkArr) == 2) ? $linkArr[1] : $this->link;
		}

		return $link;
	}

	public function linkTarget(){
		if($this->link){
			$link = explode('|', $this->link);
			return ($link && count($link) == 2) ? $link[0] : '_self';
		}
	}
	
}
