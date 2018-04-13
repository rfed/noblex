<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_category_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attribute_category_id')->unsigned();
            $table->string('value', 500);
            $table->timestamps();

            $table->foreign('attribute_category_id')->references('id')->on('attribute_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_category_product');
    }
}
