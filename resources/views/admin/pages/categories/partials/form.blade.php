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

		<!-- <div class="form-group">
		  		 	{!! Form::label('image', 'Imagen', ['class' => 'control-label col-md-3']) !!}
		  		 	<div class="col-md-3">
		  	    		<div id="image" class="dropzone"></div>
		  	    	</div>
		  		</div> -->
	</div>