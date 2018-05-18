
	<div class="form-body">

		<div class="form-group name {{ $errors->first('name') ? 'has-error' : '' }}">
			{!! Form::label('name', 'Nombre', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nombre', 'autocomplete' => 'off']) !!}
				{!! $errors->first('name', '<span class="help-block"> :message </span>') !!}
				<span class="help-block msg"></span>
			</div>
		</div>

		<div class="form-group description {{ $errors->first('description') ? 'has-error' : '' }}">
			{!! Form::label('description', 'Descripción', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'rows' => 3]) !!}
				{!! $errors->first('description', '<span class="help-block"> :message </span>') !!}
				<span class="help-block msg"></span>
			</div>
		</div>
	
		<div class="form-group {{ $errors->first('image') ? 'has-error' : '' }}">
  		 	<label for="image" class="control-label col-md-3">Icono ilustrativo negro<br/><small>PNG transparente de 60px de alto</small>
  		 		<br/><br/>
  		 		<button type="button" id="loader" class="btn btn-primary">Examinar</button>
  		 	</label>
  		 	<div class="col-md-9">
  	    		<div id="image" class="dropzone">
  	    		</div>
  	    		{!! $errors->first('image', '<span class="help-block"> :message </span>') !!}
  	    	</div>
  		</div>

		<div class="form-group">
  		 	<label for="image_featured" class="control-label col-md-3">Icono ilustrativo blanco para destaques<br/><small>PNG transparente de 50px de alto</small>
  		 		<br/><br/>
  		 		<button type="button" id="loader_featured" class="btn btn-primary">Examinar</button>
  		 	</label>
  		 	<div class="col-md-9">
  	    		<div id="image_featured" class="dropzone">
  	    		</div>
  	    	</div>
  		</div>	

		<!-- <input type="hidden" name="image"/> -->
		{!! Form::hidden('image', null, ['id' => 'currentImage']) !!}
		{!! Form::hidden('image_featured', null, ['id' => 'currentImage_featured']) !!}

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