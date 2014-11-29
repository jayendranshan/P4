<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answers', function($table) {
			# General data...
			$table->increments('id');
			$table->string('answertext');
			$table->integer('question_id')->unsigned();
			$table->integer('survey_id')->unsigned();
			$table->integer('answerCount')
			$table->timestamps();

			# Define foreign keys...
			$table->foreign('question_id')->references('id')->on('questions');
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
		Schema::drop('answers');
	}

}
