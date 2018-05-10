<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stories', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title', 200);
			$table->string('url', 200);
			$table->string('subtitle', 200);
			$table->text('content', 65535);
			$table->date('date')->nullable();
			$table->boolean('visible');
			$table->integer('theme_id');
			$table->string('image', 200)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stories');
	}

}
