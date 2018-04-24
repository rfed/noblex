@extends('admin.layouts.app')
	
@push('styles')
	<link href="{{ asset('admin/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/global/css/plugins.min.css') }}" rel="stylesheet" />
@endpush

@section('admin.includes.breadcrumbs')
	{{ Breadcrumbs::render('categorias', $parentCategory) }}
@endsection

@section('content')

	<div class="table-toolbar">
        <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
                    <a href="{{ url('panel/categorias/create/?root_id='.$root_id) }}" id="sample_editable_1_new" class="btn sbold green"> Agregar
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

	<div class="row">
		<div class="col-md-12">

			<table id="categorias" width="100%" class="table table-striped table-bordered table-hover">
				
				<thead>
					<tr>
						<th>Nombre</th>
						<th>URL</th>
						<th>Visible</th>
						<th width="200">Opciones</th>
					</tr>
				</thead>

				<tbody id="sortable">
					
					@foreach($categorias as $categoria)

					<tr>
						<td>
							@if ($root_id == 1)
							<a href="{{ url('panel/categorias/?root_id='.$categoria->id) }}">{{ $categoria->name }}</a>
							@else
							{{ $categoria->name }}
							@endif
						</td>
						<td>{{ $categoria->url }}</td>
						<td>{{ $categoria->visible == '1' ? 'Si' : 'No' }}</td>
						<td>
							{!! Form::hidden('id', $categoria->id, array('class' => "id")) !!}
							<div class="btn-group">
                    	        <a href="{{ route('admin.categorias.edit', $categoria->id) }}">
                                    <i class="icon-pencil"></i> Editar 
                                </a>
                                |
                                <a href="#" data-target='#modal-delete' data-toggle='modal' id="modal" 
                                	data-id="{{ $categoria->id }}"
                                	data-name="{{ $categoria->name }}"
                                	data-url="{{ $categoria->url }}">
                                    <i class="icon-trash"></i> Eliminar 
                                </a>
	                            
                        	</div>
                    	</td>
					</tr>

					@endforeach

				</tbody>

			</table>

		</div>
	</div>
	
	@include('admin.pages.categories.delete')

@endsection

@push('scripts')
    <script src="{{ asset('admin/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('admin/assets/pages/categorias/js/main.js') }}"></script>
	
	<script>
	$.ajaxSetup({
		headers: { "X-CSRF-TOKEN": '{{ csrf_token() }}' }
	});

	$( function() {
		
		$( "#sortable" ).disableSelection();

		$( "#sortable" ).sortable({
			update: function( e, index) {
				var mi_id = $(e.target).find('.id').val();
				var list = [];

				$.each($("#sortable tr"), function(i, el){
					var el_id = $(el).find('.id').val();
					var pos = $(el).index();
					list.push({
						id: el_id,
						position: pos
					})
					//$(el).find('td').eq(0).text(pos);
				})
				console.log(list);
				$.ajax({
					url: '/panel/categorias/orden',
					type: 'post',
					data: {categories:list},
					success: function(result) {
						console.log(result);
					},
					error: function(error){
						console.log(error);
					}
				});
			}
		});
	} );
	</script>
@endpush