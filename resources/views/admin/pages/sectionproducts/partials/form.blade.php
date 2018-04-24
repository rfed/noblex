	
	{!! Form::hidden("product_id", $product) !!}
	
	@for($i=1; $i<=4; $i++)
		<br><br>

		<div class="form-group">
		 	{!! Form::label("image".$i, "Imagen", ["class" => "control-label col-md-3"]) !!}
		 	<div class="col-md-3">
	    		<div id="image{{$i}}" class="dropzone"></div>
	    	</div>
	  	</div>

	  	{{ Form::hidden("image[$i]", null) }}

	  	<div class="form-group">
	  		 	{!! Form::label("title".$i, "Titulo", ["class" => "control-label col-md-3"]) !!}
	  		 	<div class="col-md-9">
				{!! Form::text("title[$i]", null, ["class" => "form-control", "id" => "title[$i]", "autocomplete" => "off"]) !!}
			</div>
	  	</div>

	  	<div class="form-group">
	  		 	{!! Form::label("subtitle".$i, "Subtitulo", ["class" => "control-label col-md-3"]) !!}
	  		 	<div class="col-md-9">
				{!! Form::text("subtitle[$i]", null, ["class" => "form-control", "id" => "subtitle[$i]", "autocomplete" => "off"]) !!}
			</div>
	  	</div>

	  	<div class="form-group">
	  		 	{!! Form::label("description".$i, "Descripcion", ["class" => "control-label col-md-3"]) !!}
	  		 	<div class="col-md-9">
				{!! Form::textarea("description[$i]", null, ["class" => "form-control", "id" => "description[$i]", "autocomplete" => "off", "rows" => "4"]) !!}
			</div>
	  	</div>

	  	<div class="form-group">
	  		 {!! Form::label("alignment".$i, "Alineación", ["class" => "control-label col-md-3"]) !!}
	  		 <div class="col-md-9">
	  		 	{!! Form::select("alignment[$i]", [
	  		 		""	=> "Seleccione la alineación",
	  		 		"izquierda" => "Izquierda",
	  		 		"derecha" 	=> "Derecha",
	  		 		"centrado" 	=> "Centrado"
	  		 	], null, ["class" => "form-control"]) !!}
			</div>
	  	</div>
		
		@if($i < 4)
	  		<hr>
	  	@endif

	@endfor

	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-3 col-md-9">
				{!! Form::button("<i class='fa fa-check'></i> Agregar", ["type" => "submit", "class" => "btn blue", "id" => "submitFile"]) !!}
			</div>
		</div>
	</div>	





