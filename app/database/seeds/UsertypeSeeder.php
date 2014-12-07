<?php
class UsertypeSeeder extends Seeder {

	public function run() {
		# Clear the tables to a blank slate
		DB::statement('SET FOREIGN_KEY_CHECKS=0'); # Disable FK constraints so that all rows can be deleted, even if there's an associated FK
		DB::statement('TRUNCATE usertypes');

		$admin = new Usertype;
		$admin->usertype = 'Admin';
		$admin->save();

		$participant = new Usertype;
		$participant->usertype = 'Participant';
		$participant->save();
	}
}
?>