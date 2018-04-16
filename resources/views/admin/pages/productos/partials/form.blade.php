	
	<div class="form-group {{ $errors->first('sku') ? 'has-error' : '' }}">
		{!! Form::label('sku', 'SKU', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			{!! Form::text('sku', null, ['class' => 'form-control', 'id' => 'sku']) !!}
			{!! $errors->first('sku', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>
	
	<div class="form-group">
		{!! Form::label('brand', 'Marca', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			<select name="brand_id" id="brand_id" class="form-control">
				<option value="">Seleccione una marca</option>
				
				@foreach($brands as $brand)
					<option value="{{ $brand->id }}">{{ $brand->name }}</option>
				@endforeach

			</select>
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('category', 'Categoria', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			<select name="category_id" id="category_id" class="form-control">
				<option value="">Seleccione una categoría</option>
				
				@foreach($categorias as $categoria)
					<option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
				@endforeach

			</select>
		</div>
	</div>

	<div class="form-group {{ $errors->first('short_description') ? 'has-error' : '' }}">
		{!! Form::label('short_description', 'Descripción corta', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			{!! Form::text('short_description', null, ['class' => 'form-control', 'id' => 'short_description']) !!}
			{!! $errors->first('short_description', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>

	<div class="form-group {{ $errors->first('description') ? 'has-error' : '' }}">
		{!! Form::label('description', 'Descripción', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			{!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
			{!! $errors->first('description', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>

	 <div class="form-group">
	 	{!! Form::label('file', 'Archivos', ['class' => 'control-label col-md-3']) !!}
	 	<div class="col-md-4">
    		<div class="dropzone"></div>
    	</div>
  	</div>
	
	<div class="form-group {{ $errors->first('active') ? 'has-error' : '' }}">
		{!! Form::label('active', 'Activo', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			{!! Form::checkbox('active', null, false, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'active']) !!}
			{!! $errors->first('active', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>

	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-3 col-md-9">
				{!! Form::button('<i class="fa fa-check"> Agregar</i>', ['type' => 'submit', 'class' => 'btn blue']) !!}
				
				<a href="{{ route('admin.productos.index') }}" type="button" class="btn default">Volver</a>

			</div>
		</div>
	</div>	


