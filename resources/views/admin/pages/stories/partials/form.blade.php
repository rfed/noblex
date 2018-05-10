	<div class="form-body">

		<div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
			{!! Form::label('title', 'Titulo', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Titulo', 'autocomplete' => 'off']) !!}
				{!! $errors->first('title', '<span class="help-block"> :message </span>') !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('url', 'URL', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('url', null, ['class' => 'form-control', 'id' => 'permalink', 'placeholder' => 'URL']) !!} 
				{!! $errors->first('url', '<span class="help-block"> :message </span>') !!}
			</div>
		</div>

		<div class="form-group {{ $errors->first('subtitle') ? 'has-error' : '' }}">
			{!! Form::label('subtitle', 'Subtitulo', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('subtitle', null, ['class' => 'form-control', 'id' => 'subtitle', 'placeholder' => 'Subtitulo', 'autocomplete' => 'off']) !!}
				{!! $errors->first('subtitle', '<span class="help-block"> :message </span>') !!}
			</div>
		</div>

		<div class="form-group content {{ $errors->first('content') ? 'has-error' : '' }}">
			{!! Form::label('content', 'Contenido', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content', 'rows' => 3]) !!}
				{!! $errors->first('content', '<span class="help-block"> :message </span>') !!}
				<span class="help-block msg"></span>
			</div>
		</div>

		<div class="form-group {{ $errors->first('theme_id') ? 'has-error' : '' }}" id="category">
			{!! Form::label('theme', 'Categoria', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				<select name="theme_id" id="theme_id" class="form-control" onchange="subcategorias(this.value);">
					<option value="">Seleccione una categoría</option>
					
					@foreach($themes as $cat)
						<option value="{{ $cat->id }}" @if(@$theme->id == $cat->id) selected @endif>{{ $cat->name }}</option>
					@endforeach

				</select>
				{!! $errors->first('theme_id', '<span class="help-block"> :message </span>') !!}
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

		{!! Form::hidden('image', null, ['id' => 'currentImage']) !!}

	</div>