<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50)->nullable();
            $table->text('description')->nullable();
            $table->integer('type')->default(1);
            $table->string('btn_text', 20)->nullable();
            $table->string('url')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('position');
            $table->boolean('active')->default(0);
            $table->boolean('feautures')->default(0);
            $table->boolean('show_prods')->default(0);

            $table->foreign('category_id')->on('categories')->references('id')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('widgets');
    }
}
