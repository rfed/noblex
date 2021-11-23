<div class="form-body">
    {{-- Tipo 7 es slider, como solo se admite en home estas cosas no importan --}}

@if(@$widget->type !== 7)
    {!! Form::hidden('position') !!}
    <div class="form-group {{ $errors->first('sku') ? 'has-error' : '' }}">
        {!! Form::label('title', 'Descripción', ['class' => 'control-label col-md-3']) !!}
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
                <option value="1" {{ isset($widget) && $widget->type == 1 ? 'selected' : '' }}>Imagen promocional + 3 videos</option>
                <option value="8" {{ isset($widget) && $widget->type == 8 ? 'selected' : '' }}>Categoria destacada</option>
                <option value="3" {{ isset($widget) && $widget->type == 3 ? 'selected' : '' }}>Imagen promocional con video</option>
                <option value="5" {{ isset($widget) && $widget->type == 5 ? 'selected' : '' }}>Promobox</option>
                <option value="2" {{ isset($widget) && $widget->type == 2 ? 'selected' : '' }}>Banner</option>
                
                <?php

                /*

                @foreach(\Config::get('widgets.types') as $k => $type)
                    @if($k !== 7)
                        <option value="{{ $k }}" {{ @$widget->type != $k ?: 'selected' }}>{{ $type['text'] }}</option>
                    @endif
                @endforeach*/
                ?>
            </select>
            {!! $errors->first('type', '<span class="help-block"> :message </span>') !!}
        </div>
    </div>

    <?php $widgets = \Config::get('widgets.types'); ?>

    @if (isset($widget) && in_array('category', $widgets[$widget->type]['features']))
    <div class="form-group {{ $errors->first('category_id') ? 'has-error' : '' }}">
        {!! Form::label('category_id', 'Categoria', ['class' => 'control-label col-md-3']) !!}
        
        <div class="col-md-9">
            
            @if(!empty(@$categorias) && empty(@$categoria))
            <select name="category_id" id="category-select" class="form-control">
                
                <option value=""> </option>
                @foreach($categorias as $k => $cat)
                
                    <?php $childs = $cat->childs; ?>

                    $eq = (int)@$widget->category_id !== (int)$cat->id;
                    <option value="{{ $cat->id }}" {{ @$widget->category_id !== $cat->id ?: 'selected' }}>{{ $cat->name}}</option>

                    @foreach(@$childs as $child)
                        <?php

                            $eq = (int)@$widget->category_id !== (int)$cat->id;
                        ?>
                            <option value="{{ @$child->id }}" {{ @$widget->category_id !== $child->id ?: 'selected' }} >--- {{ @$child->name}}</option>
                    @endforeach

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
    @endif

    <div class="form-group">
        {!! Form::label('active', 'Activo', ['class' => 'control-label col-md-3']) !!}
        <div class="col-md-9">
            {!! Form::checkbox('active', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'active']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('home', 'Predeterminado', ['class' => 'control-label col-md-3']) !!}
        <div class="col-md-9">
            {!! Form::checkbox('home', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'home']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('always', 'Siempre visible', ['class' => 'control-label col-md-3']) !!}
        <div class="col-md-9">
            {!! Form::checkbox('always', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'always']) !!}
        </div>
    </div>


    @if (isset($widget) && in_array('features', $widgets[$widget->type]['features']))
    <div class="form-group">
        {!! Form::label('features', 'Incluir features de categoría', ['class' => 'control-label col-md-3']) !!}
        <div class="col-md-9">
            {!! Form::checkbox('features', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'active']) !!}
        </div>
    </div>
    @endif

    @if (isset($widget) && in_array('products', $widgets[$widget->type]['features']))
    <div class="form-group">
        {!! Form::label('show_prods', 'Mostrar productos de cat.', ['class' => 'control-label col-md-3']) !!}
        <div class="col-md-9">
            {!! Form::checkbox('show_prods', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'active']) !!}
        </div>
    </div>
    @endif
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
        <div class="col-md-12 text-center">

            {!! Form::button('Guardar <i class="fa fa-angle-double-right"></i>', ['type' => 'submit', 'class' => 'btn blue submit']) !!}

            <!--
            {!! Form::button('Guardar y continuar <i class="fa fa-angle-double-right"></i>', ['type' => 'button', 'class' => 'btn blue submit', 'data-continue' => 'continue']) !!}
            -->
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
            var img_err = [];
            var vid_err = [];
            console.log("Submit");
            $('.with-error').removeClass('with-error');

            var medias = $('.media-source');

            medias.each(function(m, d){

                console.log($(this).data('url'));

                if($(this).data('type') === 'image' && ($(this).data('url') == null || $(this).data('url') == '')){
                    img_err.push({ id: d.id });
                }
                
                if($(this).data('type') === 'video'){

                    console.log($(this).find('.media-link').val() );

                    if($(this).find('.media-link').length === 0 || $(this).find('.media-link').val() == ''){
                        vid_err.push({ id: d.id });
                    }
                }

            });
            
            var err_txt = ''
        
            if(img_err.length > 0){
                err_txt = img_err.length + ' imagen' + (img_err.length < 1 ?'':'es');
            }
            
            if(vid_err.length > 0 && vid_err.length< 3){
                console.log(img_err.length);
                err_txt = img_err.length > 0 ? err_txt + ' y ' : '';
                err_txt += vid_err.length + ' video' + (vid_err.length < 1 ? '':'s');                
            }

            if(err_txt !== ''){
                $.each(vid_err.concat(img_err), function(e,b){
                    console.log(b.id);
                    $("#"+b.id).addClass('with-error');
                });

                alert('Falta completar ' + err_txt);
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

