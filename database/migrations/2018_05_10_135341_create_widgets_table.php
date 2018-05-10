<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWidgetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('widgets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 50)->nullable();
			$table->text('description', 65535)->nullable();
			$table->integer('type')->default(1);
			$table->string('btn_text', 20)->nullable();
			$table->string('url', 191)->nullable();
			$table->integer('category_id')->unsigned()->nullable()->index('widgets_category_id_foreign');
			$table->integer('position');
			$table->boolean('active')->default(0);
			$table->boolean('show_prods')->default(0);
			$table->boolean('features')->default(0);
			$table->boolean('home')->default(0);
			$table->text('metadata', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('widgets');
	}

}
