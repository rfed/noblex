
  	<div class="form-group {{ $errors->first('relatedproducts') ? 'has-error' : '' }}">
		{!! Form::label('relatedproducts', 'Productos relacionados', ['class' => 'control-label col-md-3']) !!}
		<div class="col-md-9">
			<select name="product_relationship_id[]" class="selectpicker" multiple title="Seleccione los productos relacionados" data-show-subtext="true" data-live-search="true" data-width="50%">

				@foreach($productos as $product)
					<option value="{{ $product->id }}">{{ $product->name }}</option>
				@endforeach

			</select>
			{!! $errors->first('relatedproducts', '<span class="help-block"> :message </span>') !!}
		</div>
	</div>
	
	<input type="hidden" name="product_id" value="{{ $producto }}">
	
	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-3 col-md-9">
				{!! Form::button('<i class="fa fa-check"> Agregar</i>', ['type' => 'submit', 'class' => 'btn blue']) !!}
			</div>
		</div>
	</div>	


