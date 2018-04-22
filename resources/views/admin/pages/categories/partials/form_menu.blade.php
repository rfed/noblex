	
	<div class="form-body">

		<div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
			{!! Form::label('menu', 'Mostrar en menu?', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
                {!! Form::checkbox('menu', null, null, ['class' => 'make-switch', 'data-size' => 'small']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('feautured_product', 'Producto Destacado', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('feautured_product', null, ['class' => 'form-control', 'data-size' => 'small', 'id' => 'feautured_product']) !!}
			</div>
        </div>
        
        <div class="form-group">
            {!! Form::label('info[]', 'Info relacionada', ['class' => 'control-label col-md-3']) !!}
            <div class=" col-md-9">
                <table id="info-relacionada" class="table table-striped table-bordered table-hover">
                    <tbody>
                        @foreach($categoria->info as $i => $info)
                        <tr>
                            <td>
                                {!! Form::hidden('info['.$i.'][id]', $info->id ) !!}
                                {!! Form::hidden('info['.$i.'][category_id]', $info->category_id ) !!}

                                {!! Form::text('info['.$i.'][text]', $info->text, ['class' => 'form-control info_texto', 'data-size' => 'small', 'placeholder' => 'Texto']) !!}
                            </td>
                            <td>
                                {!! Form::text('info['.$i.'][url]', $info->url, ['class' => 'form-control info_url', 'data-size' => 'small', 'placeholder' => 'Link']) !!}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="delete-info">
                                        <i class="icon-trash"></i> 
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="add-info">
                                        <i class="icon-plus"></i> 
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
		</div>

	</div>
@push('scripts')

<script>

var total_info = {{ $categoria->info->count() }};

    $(document).on('ready', function(e){
        
        $('.add-info').on('click', function(){
            e.preventDefault();
            var td = $(`<tr>
                <td>
                    <input type="text" name="info[${total_info}][text]" placeholder="Texto" class="form-control"/>
                </td>
                <td>
                    <input type="text" name="info[${total_info}][url]" placeholder="Url" class="form-control"/>
                </td>
                <td>
                    <div class="btn-group">
                        <a href="#" class="add-delete">
                            <i class="icon-trash"></i> 
                        </a>
                    </div>
                </td>
            </tr>`);
            total_info ++;
            td.insertBefore("#info-relacionada tr:last-child");
            return false;
        });
        
    });
</script>
@endpush