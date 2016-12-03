<?php

/**
* 
*/
class AdminTableSeeder extends \Illuminate\Database\Seeder
{
	
	public function run()
	{
		\DB::table('users')->insert(array(
			'first_name' => 'Patricio',
			'last_name' => 'Galarza',
			'email'=> 'patricio@mail.com',
			'password' => \Hash::make('secret'),
			'type' => 'admin',
			'full_name' => 'Patricio Galarza'
		 ));

		\DB::table('user_profiles')->insert(array(
			'user_id'	=> 1,
			'birthdate' => '1984/10/26'
		));
	}
}