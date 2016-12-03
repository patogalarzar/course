<?php namespace Course\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Course\Http\Requests;
use Course\Http\Requests\CreateUserRequest;
use Course\Http\Requests\EditUserRequest;
use Course\Http\Controllers\Controller;
use Course\User;



class UsersController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		// dd($request->get('name'));
		
		$users = User::name($request->get('name'))->orderBy('id','DESC')->paginate();

		// $users = User::paginate();

		return view('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request) // por inyeccion de dependencia envia al request los datos para ser validados
	{	
		// guardar

		// dd($request->all());
		// $user = new User($request->all());

		// $user->save();

		// return \Redirect::route('admin.users.index');

		$user = User::create(Request::all());
		return redirect()->route('admin.users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);

		return view('admin.users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditUserRequest $request, $id)
	{
		$user = User::findOrFail($id);

		$user->fill($request->all());

		$user->save();

		return redirect()->route('admin.users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		//
		// abort(500);
		// dd("Deleted id: ".$id);
	// 1era forma
		// User::destroy($id);
		// Session::flash('message', 'deleted');

	// 2da forma
		// $user = User::findOrFail($id);

		// $user->delete();

		// Session::flash('message', $user->full_name.' deleted');

		// return redirect()->route('admin.users.index');

	// 2da forma + ajax

		$user = User::findOrFail($id);

		$user->delete();

		$message = $user->full_name.' was deleted';

		// return $message;

		if ($request->ajax()) {
			// respuesta normal
			// return $message;

			// respuesta formato json
			return response()->json([
				'id'	  => $user->id,
				'message' => $message
			]);
		}

		Session::flash('message', $message);

		return redirect()->route('admin.users.index');
	}
}
