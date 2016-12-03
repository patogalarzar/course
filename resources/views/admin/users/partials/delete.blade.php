{!! Form::open(['route' => ['admin.users.destroy', $user], 'method' => 'DELETE']) !!}
	<!-- sin confiramcion borrado directo -->
	{{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
	<!-- con confiramcion mediante javascript -->
	<button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger">Delete</button>
{!! Form::close() !!}