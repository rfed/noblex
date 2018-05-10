<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('sku', 30)->index('products_sku_unique');
			$table->string('name', 100);
			$table->binary('url', 200)->nullable();
			$table->binary('tag', 3)->nullable();
			$table->integer('brand_id')->unsigned()->index('products_brand_id_foreign');
			$table->integer('category_id')->unsigned()->index('products_category_id_foreign');
			$table->text('short_description', 65535);
			$table->text('description', 65535);
			$table->boolean('featured')->default(0);
			$table->boolean('active')->default(0);
			$table->binary('manual')->nullable();
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
		Schema::drop('products');
	}

}
