<form id="form-atributos" method="post" action="{{ route('admin.productos.atributos') }}">
    <div class="form-body">
        <div class="form-group {{ $errors->first('features') ? 'has-error' : '' }}">
            {!! Form::label('grupos', 'Agregar atributo', ['class' => 'control-label col-md-3']) !!}
            <form id="form-add" method="post" action="{{ route('admin.productos.atributos.agregar') }}">
                <div class="col-md-6">
                    <select name="attribute_id" id="atributos" class="form-control">
                        <optgroup label=" ">
                            <option value=" "></option>
                            @foreach($attributes as $att)
                                <option id="option{{$att->id}}" value="{{ $att->id }}">{{ $att->name }}</option>
                            @endforeach
                        </optgroup>

                        @foreach($groups as $gr)
                        <optgroup label="{{ $gr['group']->name }}">
                            @foreach($gr['attributes'] as $att)
                                <option id="option{{$att->id}}" value="{{ $att->id }}">{{ $att->name }}</option>
                            @endforeach
                        </optgroup>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-3">
                    <button id="add-attribute" type="button" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>

        <?php $sinagrupar = $producto->attributesWithoutGroup() ?>
        
        @if(!empty($sinagrupar) and count($sinagrupar) > 0)
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    Sin agrupar
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-body" id="attributes">
                
                    @foreach($sinagrupar as $attribute)
                        @include('admin.pages.products.partials.attribute', ['attribute' => $attribute, 'value' => $attribute->pivot->value, 'id' => $attribute->id])
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        @foreach($producto->attributesWithGroup() as $group)
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    {{ $group['group']->name }}
                </div>
            </div>
            <div class="portlet-body form">
                <div class="form-body" id="grouped-cats">
                    
                    @foreach($group['attributes'] as $k => $attribute)
                        <div class="group" id="group{{ $attribute['group']->id }}">
                            @include('admin.pages.products.partials.attribute', ['attribute' => $attribute, 'value' => $attribute->pivot->value, 'id' => $attribute->pivot->id])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="form-actions">
		<div class="row">
			<div class="col-md-offset-3 col-md-9">
				{!! Form::button('Guardar <i class="fa fa-angle-double-right"></i>', ['type' => 'button', 'class' => 'btn blue', 'id' => 'save-atts']) !!}
			</div>
		</div>
	</div>
</form>

@push('scripts')
<script>
$(function() {

    $("#save-atts").click(function(e){
        e.preventDefault();
        var data = [];
        $.each($(".attribute-input"), function(){
            data.push({
                id:this.id, value:this.value
            })
        });
        console.log(data);
        $.ajax({
            url: '{{ route('admin.productos.atributos') }}',
            type: 'post',
            data: { product_id:'{{ $producto->id }}', attributes:data },
            success: function(result) {
                toastr.success('Datos guardados!');
            },
            error: function(error){
                toastr.danger('Error al guardar');
            }
        });
        console.log(data);  
    });

    $(".delete-attr").click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: '{{ route('admin.productos.atributos.delete') }}',
            type: 'post',
            data: { 
                attribute_id: id,
                producto_id: '{{ $producto->id }}'
            },
            success: function(result) {
                toastr.success('Atributo eliminado');
                $("#attribute"+id).remove();
                $("#option"+id).attr('disabled', false);
            },
            error: function(error){
                toastr.danger('Error al eliminar');
            }
        });

        return false;
    });
    
    $('#add-attribute').click(function(){
        console.log("enviar");

        $.ajax({
            url: '{{ route('admin.productos.atributos.agregar') }}',
            type: 'post',
            data: { 
                attribute_id: $("#atributos").val(),
                producto_id: '{{ $producto->id }}'
            },
            success: function(result) {
                // console.log(result);
                // var scroll = 0;
                // if(result.group){
                //     $("#group"+result.group.id).append(result.view);
                //     scroll = $("#group"+result.group.id);
                // }else{
                //     $("#attributes").append(result.view);
                //     scroll = $("#attributes");
                    
                // }

                // $("#option"+result.attribute.id).attr('disabled', true);
                // $('html, body').animate({
                //     scrollTop: scroll.offset().top + scroll.height() - 140
                // }, 200);
                window.location = '{{ route("admin.productos.edit", $producto->id) }}' + '?tab=attributes';            },
            error: function(error){
                console.log(error);
            }
        })
    });
});
</script>
@endpush

@push('scripts')
	
@endpush
