<?php

/**
* 
*/
use Faker\Factory as Faker;

class TagsTableSeeder extends \Illuminate\Database\Seeder
{
	
	public function run()
	{
		$faker= Faker::create();

		for($i=0; $i<15; $i ++)
		{
		 	\DB::table('tags')->insert(array(
		 		'name'			=>	$faker->word,
		 		'description'	=>	$faker->paragraph(rand(2,5))
		 	));
		}
	}
}