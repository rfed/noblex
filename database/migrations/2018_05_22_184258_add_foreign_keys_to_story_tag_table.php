<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStoryTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('story_tag', function(Blueprint $table)
		{
			$table->foreign('story_id', 'story_id')->references('id')->on('stories')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('tag_id', 'tag_id')->references('id')->on('tags')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('story_tag', function(Blueprint $table)
		{
			$table->dropForeign('story_id');
			$table->dropForeign('tag_id');
		});
	}

}
