<div class="form-body">
    {{-- Tipo 7 es slider, como solo se admite en home estas cosas no importan --}}

@if(@$widget->type !== 7)
    {!! Form::hidden('position') !!}
    <div class="form-group {{ $errors->first('sku') ? 'has-error' : '' }}">
        {!! Form::label('title', 'Titulo', ['class' => 'control-label col-md-3']) !!}
        <div class="col-md-9">
            {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) !!}
            {!! $errors->first('title', '<span class="help-block"> :message </span>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->first('brand_id') ? 'has-error' : '' }}">
        {!! Form::label('type', 'Tipo de widget', ['class' => 'control-label col-md-3']) !!}
        <div class="col-md-9">
            <select name="type" id="type-select" class="form-control">
                <option value=""> </option>
                @foreach(\Config::get('widgets.types') as $k => $type)
                    @if($k !== 7)
                        <option value="{{ $k }}" {{ @$widget->type != $k ?: 'selected' }}>{{ $type['text'] }}</option>
                    @endif
                @endforeach
            </select>
            {!! $errors->first('type', '<span class="help-block"> :message </span>') !!}
        </div>
    </div>


    <div class="form-group {{ $errors->first('brand_id') ? 'has-error' : '' }}">
        {!! Form::label('category_id', 'Categoria', ['class' => 'control-label col-md-3']) !!}
        
        <div class="col-md-9">
            
            @if(!empty(@$categorias) && empty(@$categoria))
            <select name="category_id" id="category-select" class="form-control">
                
                <optgroup label="Ninguna">
                    <option value=""> </option>
                </optgroup>
                @foreach($categorias as $k => $cat)
                
                <?php $childs = $cat->menuChilds(); ?>
                        <optgroup label="{{ $cat->name }}">
                            @if(count($childs) < 1)
                                $eq = (int)@$widget->category_id !== (int)$cat->id;
                                <option value="{{ $cat->id }}" {{ @$widget->category_id !== $cat->id ?: 'selected' }}>{{ $cat->name}}</option>
                            @else
                                @foreach(@$childs as $child)
                                <?php

                                    $eq = (int)@$widget->category_id !== (int)$cat->id;
                                ?>
                                    <option value="{{ @$child->id }}" {{ @$widget->category_id !== $child->id ?: 'selected' }} >{{ @$child->name}}</option>
                                @endforeach
                            @endif
                        </optgroup>
                @endforeach
            </select>
            @else
                <?php $categoria_id = @$categoria ? $categoria->id :  @$widget->category; ?>
                <?php $categoria_name = @$categoria ? $categoria->name :  @$widget->category; ?>
                {!! Form::text('category_name', $categoria_name, ['class' => 'form-control', 'id' => 'title', 'readonly' => 'true']) !!}
                {!! Form::hidden('category_id', @$categoria_id) !!}
            @endif
            {!! $errors->first('category_id', '<span class="help-block"> :message </span>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('active', 'Activo', ['class' => 'control-label col-md-3']) !!}
        <div class="col-md-9">
            {!! Form::checkbox('active', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'active']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('home', 'En Home', ['class' => 'control-label col-md-3']) !!}
        <div class="col-md-9">
            {!! Form::checkbox('home', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'active']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('features', 'Features', ['class' => 'control-label col-md-3']) !!}
        <div class="col-md-9">
            {!! Form::checkbox('features', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'active']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('show_prods', 'Mostrar productos', ['class' => 'control-label col-md-3']) !!}
        <div class="col-md-9">
            {!! Form::checkbox('show_prods', null, null, ['class' => 'make-switch', 'data-size' => 'show_prods', 'id' => 'active']) !!}
        </div>
    </div>
@else

    <div class="form-group">
        {!! Form::label('active', 'Activo', ['class' => 'control-label col-md-3']) !!}
        <div class="col-md-9">
            {!! Form::checkbox('active', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'active']) !!}
        </div>
    </div>

@endif

@if(@$widget)

    @include('admin.pages.widgets.partials.form_media')

@endif




<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">

            {!! Form::button('Guardar <i class="fa fa-angle-double-right"></i>', ['type' => 'submit', 'class' => 'btn blue submit']) !!}

            {!! Form::button('Guardar y continuar <i class="fa fa-angle-double-right"></i>', ['type' => 'button', 'class' => 'btn blue submit', 'data-continue' => 'continue']) !!}
            
            <a href="{{ route('admin.widgets.index') }}" type="button" class="btn default">Volver</a>

        </div>
    </div>
</div>	
</div>	

@push('scripts')
<script>
    $(document).on('ready', function(){

        $('#type-select').on('change', function(){

            $('.widget-form').append('<input type="hidden" name="change" value="1">');
            $('.widget-form').append('<input type="hidden" name="change-type" value="1">');
            $('#type-select').val($(this).val());
            $('.widget-form').submit();
        });

        $('#category-select').on('change', function(){
            $('.widget-form').append('<input type="hidden" name="change" value="1">');
            $('#category-select').val($(this).val());
            $('.widget-form').submit();
        });


        $('.submit').click(function(e){
            e.preventDefault();
            var error = false;
            console.log("Submit");
            
            var medias = $('.media-source');

            medias.each(function(m){

                console.log($(this).val());

                if($(this).data('type') === 'image' && ($(this).data('url') == null || $(this).data('url') == '')){
                    error = 'Complete todas las imágenes'
                }
                
                if($(this).data('type') === 'video'){

                    console.log($(this).find('.media-link').val() );

                    if($(this).find('.media-link').length === 0 || $(this).find('.media-link').val() == ''){
                        error = 'Complete todas los videos'
                    }
                }

            });

        
            if(error){
                alert(error);
                return false;
            }

            if($(this).data('continue')){
                $('.widget-form').append('<input type="hidden" name="change" value="1">');
            }

            $('.widget-form').submit();
        })
        

    })
</script>
@endpush

