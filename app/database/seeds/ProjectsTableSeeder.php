<?php

class ProjectsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('projects')->truncate();

		$projects = array(
			array(
				'title' => 'ISP Site Redesign',
				'client' => 'Copystar',
				'dealer' => 'ISP Office Solutions',
				'proposal_id' => '4711-5080404-20130318',
				'work_type' => 'Site Redesign'
			),
			array(
				'title' => 'Hilldrup Mobile Site',
				'client' => 'United',
				'dealer' => 'Hilldrup Moving & Storage',
				'proposal_id' => '1416-164-20130514',
				'work_type' => 'Mobile Site Launch'
			),
			array(
				'title' => 'Planes Mobile Site',
				'client' => 'United',
				'dealer' => 'Planes Moving Company',
				'proposal_id' => '1416-40-20130408',
				'work_type' => 'Mobile Site Launch'
			)
		);

		// Uncomment the below to run the seeder
		// DB::table('projects')->insert($projects);

		Project::insert($projects);
	}

}
