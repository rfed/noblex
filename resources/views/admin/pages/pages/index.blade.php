@extends('admin.layouts.app')
	
@push('styles')
	<link href="{{ asset('admin/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/global/css/plugins.min.css') }}" rel="stylesheet" />
@endpush

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
						<th>Visible</th>
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
    <script src="{{ asset('admin/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('admin/assets/pages/pages/js/main.js') }}"></script>
	
	<script>
	$.ajaxSetup({
		headers: { "X-CSRF-TOKEN": '{{ csrf_token() }}' }
	});
	</script>
@endpush