<?php

class TasksTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('tasks')->truncate();

		$tasks = array(
			array(
				'title' => 'Fix Services page layout.',
				'project_id' => 1
			),
			array(
				'title' => 'Add images to Business Applications page.',
				'project_id' => 1
			),
			array(
				'title' => 'Update Refurbished Products listing.',
				'project_id' => 1
			)
		);

		// Uncomment the below to run the seeder
		DB::table('tasks')->insert($tasks);
	}

}
