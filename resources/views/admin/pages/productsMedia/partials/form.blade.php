	
	{!! Form::hidden('product_id', $product) !!}

	<div class="form-group">
	 	{!! Form::label('image', 'Imagenes', ['class' => 'control-label col-md-3']) !!}
	 	<div class="col-md-9">
    		<div id="images" class="dropzone"></div>
    	</div>
  	</div>
    
  	<div class="form-group">
  		 	{!! Form::label('featured-image', 'Imagen desktop destacada', ['class' => 'control-label col-md-3']) !!}
  		 	<div class="col-md-3">
  	    		<div id="featured-image_desktop" class="dropzone"></div>
  	    	</div>
  	</div>

    <div class="form-group">
        {!! Form::label('featured-image', 'Imagen mobile destacada', ['class' => 'control-label col-md-3']) !!}
        <div class="col-md-3">
            <div id="featured-image_mobile" class="dropzone"></div>
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
				{!! Form::button('<i class="fa fa-check"></i> Agregar', ['type' => 'submit', 'class' => 'btn blue', 'id' => 'submitFiles']) !!}
			</div>
		</div>
	</div>	


