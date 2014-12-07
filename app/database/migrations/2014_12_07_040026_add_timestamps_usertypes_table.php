<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampsUsertypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usertypes',function($table) {
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
		Schema::table('usertypes', function($table) {
    	$table->dropColumn('updated_at');
    	$table->dropColumn('created_at');
});
	}

}
