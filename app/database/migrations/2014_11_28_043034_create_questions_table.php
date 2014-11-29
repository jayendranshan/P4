<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function($table) {
			# General data...
			$table->increments('id');
			$table->string('questiontext');
			
			$table->integer('survey_id')->unsigned();
			$table->timestamps();

			# Define foreign keys...
			$table->foreign('survey_id')->references('id')->on('surveys');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questions');
	}

}
