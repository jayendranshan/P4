<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {
		    $table->increments('id');
		    $table->string('email')->unique();
		    $table->string('remember_token',100); 
		    $table->string('password');
		    $table->timestamps();
		    $table->integer('usertype_id')->unsigned();

		    # Define foreign keys...
			$table->foreign('usertype_id')->references('id')->on('usertypes');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
