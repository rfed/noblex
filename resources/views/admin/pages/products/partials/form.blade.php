	
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
	
	{!! Form::hidden('brand_id', 1) !!}
	<!--
	<div class="form-group {{ $errors->first('brand_id') ? 'has-error' : '' }}">
		{!! Form::label('brand', 'Marca', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			<select name="brand_id" id="brand_id" class="form-control">
				<option value="">Seleccione una marca</option>
				
				@foreach($brands as $brand)
					<option value="{{ $brand->id }}" @if(@$producto->brand_id === $brand->id) selected @else {{ old('brand_id') != $brand->id ?: 'selected' }} @endif>{{ $brand->name }}</option>
				@endforeach

			</select>
			{!! $errors->first('brand_id', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>
	-->
	
	<div class="form-group {{ $errors->first('category_id') ? 'has-error' : '' }}" id="category">
		{!! Form::label('category', 'Categoria', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			<select name="category_id" id="category_id" class="form-control" onchange="subcategorias(this.value);">
				<option value="">Seleccione una categoría</option>
				
				@foreach($categorias as $cat)
					<option value="{{ $cat->id }}" @if(@$categoria->id == $cat->id) selected @endif>{{ $cat->name }}</option>
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

	<div class="form-group {{ $errors->first('tag') ? 'has-error' : '' }}">
		{!! Form::label('tag', 'Cucarda', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-2">
			{!! Form::text('tag', null, ['class' => 'form-control', 'id' => 'name', 'maxlength' => '3']) !!}
			{!! $errors->first('tag', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>

	<div class="form-group {{ $errors->first('features') ? 'has-error' : '' }}">
		{!! Form::label('feature', 'Features destacados', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">

			{!! Form::select("feature_product_id[]", $features->pluck('name', 'id') , isset($producto) ? $producto->features->pluck('id') : null, ["class" => "selectpicker", "multiple" => "true" , "title"=>"Seleccione los features", "data-show-subtext"=>"true", "data-live-search"=>"true", "data-width"=>"50%"]) !!}

			{!! $errors->first('feature', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>

	<div class="form-group {{ $errors->first('features') ? 'has-error' : '' }}">
		{!! Form::label('feature', 'Features', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">

			{!! Form::select("feature_product_id[]", $features->pluck('name', 'id') , isset($producto) ? $producto->features->pluck('id') : null, ["class" => "selectpicker", "multiple" => "true" , "title"=>"Seleccione los features", "data-show-subtext"=>"true", "data-live-search"=>"true", "data-width"=>"50%"]) !!}

			{!! $errors->first('feature', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('relatedproducts', 'Productos relacionados', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">

			{!! Form::select("product_relationship_id[]", $productos->pluck('name', 'id') , isset($producto) ? $producto->relatedproducts->pluck('id') : null, ["class" => "selectpicker", "multiple" => "true" , "title"=>"Seleccione los productos relacionados", "data-show-subtext"=>"true", "data-live-search"=>"true", "data-width"=>"50%"]) !!}
				
			{!! $errors->first('relatedproducts', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('active', 'Activo', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			{!! Form::checkbox('active', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'active']) !!}
		</div>
	</div>

	<!--
	<div class="form-group {{ $errors->first('featured') ? 'has-error' : '' }}">
		{!! Form::label('featured', 'Destacado', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			{!! Form::checkbox('featured', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'featured']) !!}
			{!! $errors->first('featured', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>
	-->

	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-3 col-md-9">
				{!! Form::button('Continuar <i class="fa fa-angle-double-right"></i>', ['type' => 'submit', 'class' => 'btn blue']) !!}
				
				<a href="{{ route('admin.productos.index') }}" type="button" class="btn default">Volver</a>

			</div>
		</div>
	</div>	


