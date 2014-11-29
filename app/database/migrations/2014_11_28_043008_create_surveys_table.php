<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('surveys', function($table) {
		    $table->increments('id');
		    $table->string('name');
		    $table->text('description'); 
		    $table->integer('user_id')->unsigned();
		    $table->date('lastvaliddate');
		    $table->boolean('isactive');
		    $table->timestamps();

		    # Define foreign keys...
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('surveys');
	}

}
