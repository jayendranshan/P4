<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSurveyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_survey', function($table) {
			# AI, PK
			# none needed
			# General data...
			$table->integer('user_id')->unsigned();
			$table->integer('survey_id')->unsigned();
			
			# Define foreign keys...
			$table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('user_survey');
	}

}
