<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWidgetsMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('widgets_media', function(Blueprint $table)
		{
			$table->foreign('widget_id')->references('id')->on('widgets')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('widgets_media', function(Blueprint $table)
		{
			$table->dropForeign('widgets_media_widget_id_foreign');
		});
	}

}
