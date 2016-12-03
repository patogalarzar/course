<html>
	<head>
		<title>Laravel</title>

		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
			.credentials {
				/*font-size: 16px;*/
				margin-top: 10px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Laravel 5</div>
				<div class="quote">{{ Inspiring::quote() }}</div>
				<div class="credentials">
					<a href="{{ url('/auth/login') }}" class="btn btn-default">Login</a>
					<a href="{{ url('/auth/register') }}" class="btn btn-primary">Register</a>
				</div>
			</div>
		</div>
	</body>
</html>
