<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeatureProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('feature_product', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('feature_id')->unsigned()->index('feature_product_feature_id_foreign');
			$table->integer('product_id')->unsigned()->index('feature_product_product_id_foreign');
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
		Schema::drop('feature_product');
	}

}
