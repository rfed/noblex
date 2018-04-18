	
	<div class="form-group {{ $errors->first('sku') ? 'has-error' : '' }}">
		{!! Form::label('sku', 'SKU', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			{!! Form::text('sku', null, ['class' => 'form-control', 'id' => 'sku']) !!}
			{!! $errors->first('sku', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>

	<div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
		{!! Form::label('name', 'Nombre', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
			{!! $errors->first('name', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>
	
	<div class="form-group {{ $errors->first('brand_id') ? 'has-error' : '' }}">
		{!! Form::label('brand', 'Marca', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			<select name="brand_id" id="brand_id" class="form-control">
				<option value="">Seleccione una marca</option>
				
				@foreach($brands as $brand)
					<option value="{{ $brand->id }}" {{ old('brand_id') != $brand->id ?: 'selected' }}>{{ $brand->name }}</option>
				@endforeach

			</select>
			{!! $errors->first('brand_id', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>

	<div class="form-group {{ $errors->first('category_id') ? 'has-error' : '' }}">
		{!! Form::label('category', 'Categoria', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			<select name="category_id" id="category_id" class="form-control">
				<option value="">Seleccione una categoría</option>
				
				@foreach($categorias as $categoria)
					<option value="{{ $categoria->id }}" {{ old('category_id') != $categoria->id ?: 'selected' }}>{{ $categoria->name }}</option>
				@endforeach

			</select>
			{!! $errors->first('category_id', '<span class="help-block"> :message </span>') !!}
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
		{!! Form::label('active', 'Activo', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			{!! Form::checkbox('active', null, 0, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'active']) !!}
		</div>
	</div>

	<div class="form-group {{ $errors->first('featured') ? 'has-error' : '' }}">
		{!! Form::label('featured', 'Destacado', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			{!! Form::checkbox('featured', null, 0, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'featured']) !!}
			{!! $errors->first('featured', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>

	
	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-3 col-md-9">
				{!! Form::button('Continuar <i class="fa fa-angle-double-right"></i>', ['type' => 'submit', 'class' => 'btn blue']) !!}
				
				<a href="{{ route('admin.productos.index') }}" type="button" class="btn default">Volver</a>

			</div>
		</div>
	</div>	


