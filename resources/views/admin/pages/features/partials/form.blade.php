
	<div class="form-body">

		<div class="form-group name {{ $errors->first('name') ? 'has-error' : '' }}">
			{!! Form::label('name', 'Nombre', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nombre', 'autocomplete' => 'off']) !!}
				<span class="help-block msg"></span>
			</div>
		</div>

		<div class="form-group description {{ $errors->first('description') ? 'has-error' : '' }}">
			{!! Form::label('description', 'Descripción', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
				{!! $errors->first('description', '<span class="help-block"> :message </span>') !!}
				<span class="help-block msg"></span>
			</div>
		</div>
	

		<div class="form-group">
  		 	{!! Form::label('image', 'Imagen', ['class' => 'control-label col-md-3']) !!}
  		 	<div class="col-md-3">
  	    		<div id="image" class="dropzone"></div>
  	    	</div>
  		</div>
	
		<!-- <input type="hidden" name="image"/> -->
		{!! Form::hidden('image', null) !!}

	</div>

	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-3 col-md-9">
				@isset($feature)
					{!! Form::button('<i class="fa fa-check"></i> Editar', ['type' => 'submit', 'class' => 'btn yellow', 'id' => 'submitFile']) !!}
				@else
					{!! Form::button('<i class="fa fa-check"></i> Agregar', ['type' => 'submit', 'class' => 'btn blue', 'id' => 'submitFile']) !!}
				@endisset

				<a href="{{ route('admin.brands.index') }}" type="button" class="btn default">Volver</a>

			</div>
		</div>
	</div>