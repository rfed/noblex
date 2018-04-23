	
	<div class="form-group {{ $errors->first('sku') ? 'has-error' : '' }}">
		{!! Form::label('sku', 'SKU', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			{!! Form::text('sku', null, ['class' => 'form-control', 'id' => 'sku', 'autocomplete' => 'off']) !!}
			{!! $errors->first('sku', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>

	<div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
		{!! Form::label('name', 'Nombre', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'autocomplete' => 'off']) !!}
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

	<div class="form-group {{ $errors->first('category_id') ? 'has-error' : '' }}" id="category">
		{!! Form::label('category', 'Categoria', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			<select name="category_id" id="category_id" class="form-control" onchange="subcategorias(this.value);">
				<option value="">Seleccione una categoría</option>
				
				@foreach($categorias as $categoria)
					<option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
				@endforeach

			</select>
			{!! $errors->first('category_id', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>

	<div class="form-group" id="subcategory" style="display:none">
		{!! Form::label('subcategory', 'Subcategoria', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			<select name="subcategory_id" id="subcategory_id" class="form-control">
				<option value="">Seleccione una Subcategoría</option>
			</select>
		</div>
	</div>

	<div class="form-group {{ $errors->first('short_description') ? 'has-error' : '' }}">
		{!! Form::label('short_description', 'Descripción corta', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			{!! Form::text('short_description', null, ['class' => 'form-control', 'id' => 'short_description', 'autocomplete' => 'off']) !!}
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

	<div class="form-group {{ $errors->first('features') ? 'has-error' : '' }}">
		{!! Form::label('feature', 'Features', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			<select name="feature_product_id[]" class="selectpicker" multiple title="Seleccione los features" data-show-subtext="true" data-live-search="true" data-width="50%">

				@foreach($features as $feature)
					<option value="{{ $feature->id }}" 
						@if( old("feature_product_id") ) 
							{{ (in_array($feature->id, old("feature_product_id")) ? 'selected' : '') }}
						@endif
					>{{ $feature->name }}</option>
				@endforeach

			</select>
			{!! $errors->first('feature', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('relatedproducts', 'Productos relacionados', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			<select name="product_relationship_id[]" class="selectpicker" multiple title="Seleccione los productos relacionados" data-show-subtext="true" data-live-search="true" data-width="50%">

				@foreach($productos as $product)
					<option value="{{ $product->id }}"
						@if( old("product_relationship_id") ) 
							{{ (in_array($product->id, old("product_relationship_id")) ? 'selected' : '') }}
						@endif
						>{{ $product->name }}</option>
				@endforeach

			</select>
			{!! $errors->first('relatedproducts', '<span class="help-block"> :message </span>') !!}
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


