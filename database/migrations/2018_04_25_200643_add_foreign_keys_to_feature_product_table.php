<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFeatureProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('feature_product', function(Blueprint $table)
		{
			$table->foreign('feature_id')->references('id')->on('features')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('feature_product', function(Blueprint $table)
		{
			$table->dropForeign('feature_product_feature_id_foreign');
			$table->dropForeign('feature_product_product_id_foreign');
		});
	}

}
