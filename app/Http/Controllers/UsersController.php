<?php namespace Course\Http\Controllers;

use Course\Http\Requests;
use Course\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Course\User; // nesecitamos importar la clase para ORM

class UsersController extends Controller {

	//
	public function getOrm()
	{
		// ORM
		// $result = User::get();

		// // dd($result->profile->age);
		// dd($result);

		// ORM + FLUENT
		$users = User::select('id','first_name')
				->with('profile')
				->where('first_name','<>','patricio')
				->orderBy('first_name','ASC')
				->get();
		dd($users->toArray());
	}

	public function getIndex()
	{
		// FLUENT (query builder) -------------------------------

		// $result= \DB::table('users')->get();//obtiene todos los datos de la tabla

		$result= \DB::table('users')
			->select([	
						// 'users.first_name as first',
						// 'users.last_name as last',
						'users.*',
						'user_profiles.birthdate',
						'user_profiles.twitter as twttr',
						'user_profiles.website as www'
					])
			// ->where('first_name','patricio')// por defecto utiliza =
			// ->where('first_name','<>','patricio')
			->orderBy('users.id','ASC')
			// ->join('user_profiles','users.id','=','user_profiles.user_id') //si no hay coincidencias en el join no carga ese usuario
			->leftJoin('user_profiles','users.id','=','user_profiles.user_id') //carga todo asi no haya coincidencias en el join
			->get();

		// agregar propiedades (no es lo optimo pero ayuda)

		foreach ($result as $row) 
		{
			$row->full = $row->first_name.' '.$row->last_name;
			$row->age = \Carbon\Carbon::parse($row->birthdate)->age;
		}

		dd($result);

		return $result;
	}
}
