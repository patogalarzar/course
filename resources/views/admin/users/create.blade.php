@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10-colmd-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Create User</div>
					<div class="panel-body">
						@include('admin.partials.messages')
						{!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}
							@include('admin.users.partials.fields')
							<button type="submit" class="btn btn-default">Submit</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop