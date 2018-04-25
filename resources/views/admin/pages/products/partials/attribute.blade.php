<div class="form-group" id="attribute{{ $attribute->id }}">
    {!! Form::label("att_name", $attribute->name, ["class" => "control-label col-md-2"]) !!}
    <div class="col-md-8">
        {!! Form::text('attribute['.$attribute->id.']', $value, ["class" => "form-control attribute-input", "id" => $attribute->pivot->id, "autocomplete" => "off"]) !!}
    </div>
    <div class="col-md-2 btn-group">
        <a href="#" class="delete-attr"
        data-id="{{ $attribute->id }}">
            <i class="icon-trash"></i> Eliminar 
        </a>
    </div>
</div>