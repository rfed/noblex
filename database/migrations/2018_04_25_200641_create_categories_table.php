<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('url', 191)->nullable();
			$table->integer('root_id')->default(0);
			$table->string('image', 191)->nullable();
			$table->boolean('visible')->default(0);
			$table->timestamps();
			$table->string('feautured_product', 30)->nullable()->index('categories_feautured_product_foreign');
			$table->boolean('menu')->default(0);
			$table->integer('position')->nullable();
			$table->binary('title', 200)->nullable();
			$table->string('description', 200)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}
