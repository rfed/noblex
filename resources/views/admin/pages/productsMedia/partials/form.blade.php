	
	{!! Form::hidden('product_id', $product) !!}
  
  <div class="form-group">
    {!! Form::label('image_featured', 'Imagenen destacada', ['class' => 'control-label col-md-3']) !!}
    <div class="col-md-3">
        <div id="image_featured" class="dropzone"></div>
      </div>
    </div>

  	<div class="form-group">
  		 	{!! Form::label('image_featured_background', 'Imagen fondo destacada', ['class' => 'control-label col-md-3']) !!}
  		 	<div class="col-md-3">
  	    		<div id="image_featured_background" class="dropzone"></div>
  	    	</div>
  	</div>

    <div class="form-group">
    {!! Form::label('images', 'Imagenes slider', ['class' => 'control-label col-md-3']) !!}
    <div class="col-md-9">
        <div id="images" class="dropzone"></div>
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('image_thumb', 'Imagen thumb', ['class' => 'control-label col-md-3']) !!}
        <div class="col-md-3">
            <div id="image_thumb" class="dropzone"></div>
          </div>
    </div>

  	<div class="form-group">
  		 	{!! Form::label('document', 'Documento PDF', ['class' => 'control-label col-md-3']) !!}
  		 	<div class="col-md-3">
  	    		<div id="document" class="dropzone"></div>
  	    </div>
  	</div>
	
	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-3 col-md-9">
				{!! Form::button('Continuar <i class="fa fa-angle-double-right"></i>', ['type' => 'submit', 'class' => 'btn blue', 'id' => 'submitFiles']) !!}
			</div>
		</div>
	</div>	


