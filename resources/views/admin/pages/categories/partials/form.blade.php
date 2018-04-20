	
	{!! Form::hidden('root_id', $root_id) !!}

	<div class="form-body">

		<div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
			{!! Form::label('name', 'Nombre', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nombre']) !!}
				{!! $errors->first('name', '<span class="help-block"> :message </span>') !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('url', 'URL', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('url', null, ['class' => 'form-control', 'id' => 'permalink', 'placeholder' => 'URL']) !!} 
			</div>
		</div>

	</div>

	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-3 col-md-9">
				{!! Form::button('<i class="fa fa-check"></i> Agregar', ['type' => 'submit', 'class' => 'btn blue']) !!}

				<a href="{{ route('admin.categorias.index') }}" type="button" class="btn default">Volver</a>

			</div>
		</div>
	</div>