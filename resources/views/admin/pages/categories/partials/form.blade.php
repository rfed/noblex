	{!! Form::hidden('root_id', $root_id) !!}
	<div class="form-body">

		<div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
			{!! Form::label('name', 'Nombre', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nombre', 'autocomplete' => 'off']) !!}
				{!! $errors->first('name', '<span class="help-block"> :message </span>') !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('url', 'URL', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('url', null, ['class' => 'form-control', 'id' => 'permalink', 'placeholder' => 'URL']) !!} 
				{!! $errors->first('url', '<span class="help-block"> :message </span>') !!}
			</div>
		</div>

		<div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
			{!! Form::label('title', 'Titulo', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Titulo', 'autocomplete' => 'off']) !!}
				{!! $errors->first('title', '<span class="help-block"> :message </span>') !!}
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

		<div class="form-group">
  		 	<label for="image" class="control-label col-md-3">Imagen<br/><small>JPG/PNG 1140x433px</small>
  		 		<br/><br/>
  		 		<button type="button" id="loader" class="btn btn-primary">Examinar</button>
  		 	</label>
  		 	<div class="col-md-9">
  	    		<div id="image" class="dropzone">
  	    		</div>
  	    	</div>
  		</div>

		<div class="form-group">
			{!! Form::label('visible', 'Visible', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::checkbox('visible', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'visible']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('menu', 'Menu', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::checkbox('menu', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'home']) !!}
			</div>
		</div>

		{!! Form::hidden('image', null, ['id' => 'currentImage']) !!}

	</div>