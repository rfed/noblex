		

	<div class="portlet box blue">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-plus"></i> Atributos
			</div>
		</div>
		
		<div class="portlet-body form">
			<div class="form-body">						
			

			  	@foreach($producto->attributes as $attribute)
                <div class="form-group">
                    {{ dd($attribute->toArray()) }}
			  		 	{!! Form::label("att_name", $attribute->name, ["class" => "control-label col-md-3"]) !!}
			  		 	<div class="col-md-9">
						{!! Form::text("title", $attribute->pivot->value, ["class" => "form-control title", "id" => "title", "autocomplete" => "off"]) !!}
					</div>
			  	</div>
                @endforeach

			</div>
		</div>
	</div>


@push('scripts')
	
@endpush
