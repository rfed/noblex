<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmailSubjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('email_subjects', function(Blueprint $table)
		{
			$table->integer('subject_id');
			$table->string('email', 100);
			$table->timestamps();
			$table->primary(['subject_id','email']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('email_subjects');
	}

}
