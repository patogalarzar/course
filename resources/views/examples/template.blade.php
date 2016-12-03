@extends('examples.layout')
@section('title')
	Laravel
@stop
@section('content')
			<h1>Download your certificate here</h1>
			<h3>BLADE Template</h3>

			@if (isset($user))
				<p>Bienvenido {{ $user }} </p>
			@else
				<p>Login</p>
			@endif
			<!-- <a href="#" target ="_self">Download</a> -->
@stop
			
		