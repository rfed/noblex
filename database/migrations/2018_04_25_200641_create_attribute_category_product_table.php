<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttributeCategoryProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attribute_category_product', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('attribute_id')->unsigned()->index('attribute_category_product_attribute_category_id_foreign');
			$table->integer('product_id')->unsigned()->index('attribute_category_product_product_id_foreign');
			$table->string('value', 500)->nullable();
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
		Schema::drop('attribute_category_product');
	}

}
