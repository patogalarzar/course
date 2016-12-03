@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10-colmd-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Users</div>
					@if (Session::has('message'))
						<p class="alert alert-success" style="margin-top: 3px;">
							{{ Session::get('message') }}
						</p>
					@endif
					<div class="panel-body">
						{!! Form::open(['route' => 'admin.users.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right']) !!}
							<div class="form-group">
								{!! Form::text('name', null,['class' => 'form-control', 'placeholder' => 'users name']) !!}
							</div>
							<button type="submit" class="btn btn-default">Search</button>
						{!! Form::close() !!}
						<p>
							<a href="{{ route('admin.users.create') }}" class="btn btn-info">New</a>
						</p>
						<p>there's {{ $users->total() }} users</p>
						<p id="last-deleted">last deleted</p>
						@include('admin.users.partials.table')
						{!! $users->render() !!}
					</div>
				</div>
				
			</div>
		</div>
	</div>
	{{-- formulario oculto para eliminar mediante js --}}
	{!! Form::open(['route' => ['admin.users.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
	{!! Form::close() !!}
@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function () {
			$('.btn-delete').click(function (e) {

				e.preventDefault();

				var row  = $(this).parents('tr');
				var id   = row.data('id');
				var form = $('#form-delete');
				var url  = form.attr('action').replace(':USER_ID',id);
				var data = form.serialize();

				row.fadeOut();
				
				// alert("button delete at row: " + id + "; url: " + url + "data: " + data);
				$.post(url, data, function (result) {
					// respuesta normal
					// alert(result);

					// respuesta formato json
					alert(result.message);

					$('#last-deleted').text('last deleted id was '+result.id);
				}).fail(function () {
					row.fadeIn();
					alert("Not deleted :X");
				});

			});
		});
	</script>
@endsection