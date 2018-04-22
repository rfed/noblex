<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetsMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widgets_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('widget_id')->unsigned();
            $table->string('source', 500)->nullable();
            $table->enum('type', ['image', 'video'])->default('image');
            $table->integer('position')->unsigned();
            $table->integer('title')->nullable();
            $table->integer('description')->nullable();
            $table->integer('link')->nullable();

            $table->timestamps();

            $table->foreign('widget_id')->references('id')->on('widgets')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('widgets_media');
    }
}
