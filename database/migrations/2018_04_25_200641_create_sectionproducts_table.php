<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSectionproductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sectionproducts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->unsigned()->index('sectionproducts_product_id_foreign');
			$table->boolean('position');
			$table->string('title', 191);
			$table->text('subtitle', 65535);
			$table->text('description', 65535);
			$table->string('source', 500);
			$table->string('alignment', 191);
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
		Schema::drop('sectionproducts');
	}

}
