							<div class="form-group">
								{!! Form::label('email', 'Correo electronico') !!}
								{!! Form::text('email',null, ['class' => 'form-control','placeholder' => 'Por favor introduzca su email']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('password', 'Contraseña') !!}
								{!! Form::password('password', ['class' => 'form-control']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('first_name', 'Primer Nombre') !!}
								{!! Form::text('first_name',null, ['class' => 'form-control']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('last_name', 'Apellido') !!}
								{!! Form::text('last_name',null, ['class' => 'form-control']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('type', 'Tipo de usuario') !!}
								{!! Form::select('type', ['' => 'Selecione tipo', 'user' => 'Usuario', 'admin' => 'Administrador'], null, ['class' => 'form-control']) !!}
							</div>