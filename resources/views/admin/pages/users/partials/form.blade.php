<style>
.mt-checkbox { float:left; width:250px; }
</style>

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
	        <div class="col-md-2">
	            {!! Form::checkbox('admin', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'admin']) !!}
	        </div>
	        <div class="col-md-7">
				<div class="mt-checkbox-list" style="padding:10px; display:{{ isset($user) && $user->admin ? 'none' : 'block' }}" id="permissions">
				    <label class="mt-checkbox">
				        <input type="checkbox" class="chkAll"> Todos
				        <span></span>
				    </label>
				    <label class="mt-checkbox">
				        <input type="checkbox" name="permissions[]" class="chk" value="home" {{ isset($user) && in_array('home', $user->permissions) ? 'checked' : '' }}> Pagina Inicial
				        <span></span>
				    </label>
				    <label class="mt-checkbox">
				        <input type="checkbox" name="permissions[]" class="chk" value="config"> Configuracion
				        <span></span>
				    </label>
				    <label class="mt-checkbox">
				        <input type="checkbox" name="permissions[]" class="chk" value="categories"> Categorias
				        <span></span>
				    </label>
				    <label class="mt-checkbox">
				        <input type="checkbox" name="permissions[]" class="chk" value="products"> Productos
				        <span></span>
				    </label>
				    <label class="mt-checkbox">
				        <input type="checkbox" name="permissions[]" class="chk" value="newsletter"> Newsletter
				        <span></span>
				    </label>
				    <label class="mt-checkbox">
				        <input type="checkbox" name="permissions[]" class="chk" value="stories"> Novedades
				        <span></span>
				    </label>
				    <label class="mt-checkbox">
				        <input type="checkbox" name="permissions[]" class="chk" value="contents"> Paginas de Contenido
				        <span></span>
				    </label>
				    <label class="mt-checkbox">
				        <input type="checkbox" name="permissions[]" class="chk" value="contacts"> Contactos
				        <span></span>
				    </label>
				    <label class="mt-checkbox">
				        <input type="checkbox" name="permissions[]" class="chk" value="customers"> Clientes
				        <span></span>
				    </label>
				</div>	        	
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


@push('scripts')
<script>
	$(function() {
		$('#admin').on('switchChange.bootstrapSwitch', function (e, data) {
			if (!data) {
				$('#permissions').show();
			}
			else {
				$('#permissions').hide();
			}
		});

		$('.chkAll').click(function(){
			$('.chk').trigger('click');
		});
	});
</script>
@endpush	