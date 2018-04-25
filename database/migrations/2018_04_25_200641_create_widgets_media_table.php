<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWidgetsMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('widgets_media', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('widget_id')->unsigned()->index('widgets_media_widget_id_foreign');
			$table->string('source', 500)->nullable();
			$table->enum('type', array('image','video'))->default('image');
			$table->integer('position')->unsigned();
			$table->timestamps();
			$table->string('title', 50)->nullable();
			$table->binary('subtitle', 200)->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('link', 500)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('widgets_media');
	}

}
