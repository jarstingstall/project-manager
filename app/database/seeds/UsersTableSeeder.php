<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('users')->truncate();

		$users = array(
			array('email' => 'jrarst01@gmail.com', 'password' => 'dining1')
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
