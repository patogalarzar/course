<?php

/**
* 
*/
use Faker\Factory as Faker;

class UserTableSeeder extends \Illuminate\Database\Seeder
{
	
	public function run()
	{
		$faker= Faker::create();

		for($i=0; $i<30; $i ++)
		{
			$firstName = $faker->firstName;
			$lastName = $faker->lastName;
			$id = \DB::table('users')->insertGetId(array(
				'first_name'	=> $firstName,
				'last_name' 	=> $lastName,
				'email'			=> $faker->unique()->email,
				'password' 		=> \Hash::make('user'),
				'type' 			=> 'user'
		 	));

		 	\DB::table('user_profiles')->insert(array(
		 		'user_id'	=>	$id,
		 		'bio'		=>	$faker->paragraph(rand(2,5)),
		 		'twitter'	=>	'http://www.twitter.com/'.$faker->userName,
		 		'website'	=>	'http://www.'.$faker->domainName,
		 		'birthdate'	=>	$faker->dateTimeBetween($startDate = '-35 years', $endDate = 'now')
		 	));
		}

		
	}
}