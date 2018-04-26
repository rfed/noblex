<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelatedproductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relatedproducts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->unsigned()->index('relatedproducts_product_id_foreign');
			$table->integer('product_relationship_id')->unsigned()->index('relatedproducts_product_relationship_id_foreign');
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
		Schema::drop('relatedproducts');
	}

}
