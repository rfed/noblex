
	<div class="form-body">

		<div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
			{!! Form::label('name', 'Nombre', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nombre', 'autocomplete' => 'off']) !!}
				{!! $errors->first('name', '<span class="help-block"> :message </span>') !!}
			</div>
		</div>

		<div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
			{!! Form::label('email', 'E-Mail', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-Mail', 'autocomplete' => 'off']) !!}
				{!! $errors->first('email', '<span class="help-block"> :message </span>') !!}
			</div>
		</div>

		<div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
			{!! Form::label('password', 'Contraseña', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Contraseña', 'autocomplete' => 'off']) !!}
				{!! $errors->first('password', '<span class="help-block"> :message </span>') !!}
			</div>
		</div>

		<div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
			{!! Form::label('password2', 'Verificar Contraseña', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::password('password2', ['class' => 'form-control', 'id' => 'password2', 'placeholder' => 'Reingresar contraseña', 'autocomplete' => 'off']) !!}
				{!! $errors->first('password2', '<span class="help-block"> :message </span>') !!}
			</div>
		</div>

		@if (isset($user) && $user->id == 1)
		{!! Form::hidden('admin', 1) !!}
		@else
	    <div class="form-group">
	        {!! Form::label('admin', 'Super Administrador', ['class' => 'control-label col-md-3']) !!}
	        <div class="col-md-9">
	            {!! Form::checkbox('admin', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'admin']) !!}
	        </div>
	    </div>
	    @endif
	</div>

	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-3 col-md-9">
				@isset($brand)
					{!! Form::button('<i class="fa fa-check"></i> Editar', ['type' => 'submit', 'class' => 'btn yellow', 'id' => 'submitFile']) !!}
				@else
					{!! Form::button('<i class="fa fa-check"></i> Agregar', ['type' => 'submit', 'class' => 'btn blue', 'id' => 'submitFile']) !!}
				@endisset

				<a href="{{ route('admin.users.index') }}" type="button" class="btn default">Volver</a>

			</div>
		</div>
	</div>