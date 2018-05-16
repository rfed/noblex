@extends('admin.layouts.app')
	
@section('content')

	<div class="table-toolbar">
        <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
                    <a href="{{ url('panel/pages/create') }}" id="sample_editable_1_new" class="btn sbold green"> Agregar
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

	<div class="row">
		<div class="col-md-12">

			<table id="pages" width="100%" class="table table-striped table-bordered table-hover">
				
				<thead>
					<tr>
						<th>Titulo</th>
						<th>Activo</th>
						<th width="330">Opciones</th>
					</tr>
				</thead>

				<tbody id="sortable">
					
					@foreach($pages as $story)

					<tr>
						<td>{{ $story->title }}</td>
						<td>{{ $story->visible == '1' ? 'Si' : 'No' }}</td>
						<td>
							{!! Form::hidden('id', $story->id, array('class' => "id")) !!}
							<div class="btn-group">
                    	        <a href="{{ route('admin.pages.edit', $story->id) }}">
                                    <i class="icon-pencil"></i> Editar 
                                </a>
                                |
                                <a href="#" data-target='#modal-delete' data-toggle='modal' id="modal" 
                                	data-id="{{ $story->id }}"
                                	data-name="{{ $story->title }}"
                                	data-url="{{ route('admin.pages.destroy', $story->id) }}">
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
	
	@include('admin.pages.pages.delete')

@endsection

@push('scripts')
    <script src="{{ asset('admin/assets/pages/pages/js/main.js') }}"></script>
	
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
				
				$.ajax({
					url: '/panel/pages/orden',
					type: 'post',
					data: {pages:list},
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