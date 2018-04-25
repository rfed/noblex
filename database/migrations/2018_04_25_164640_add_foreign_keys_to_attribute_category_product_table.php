<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAttributeCategoryProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('attribute_category_product', function(Blueprint $table)
		{
			$table->foreign('attribute_id', 'attribute_category_product_attribute_category_id_foreign')->references('id')->on('attributes')->onUpdate('CASCADE')->onDelete('CASCADE');
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
		Schema::table('attribute_category_product', function(Blueprint $table)
		{
			$table->dropForeign('attribute_category_product_attribute_category_id_foreign');
			$table->dropForeign('attribute_category_product_product_id_foreign');
		});
	}

}
