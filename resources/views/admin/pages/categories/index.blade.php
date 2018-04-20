@extends('admin.layouts.app')
	
@push('styles')
	<link href="{{ asset('admin/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/global/css/plugins.min.css') }}" rel="stylesheet" />
@endpush

@section('breadcrumbs')
	{{ Breadcrumbs::render('categorias', $parentCategory) }}
@endsection

@section('content')

	<div class="table-toolbar">
        <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
                    <a href="{{ url('categorias/create/?root_id='.$root_id) }}" id="sample_editable_1_new" class="btn sbold green"> Agregar
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
						<th width="200">Opciones</th>
					</tr>
				</thead>

				<tbody>
					
					@foreach($categorias as $categoria)

					<tr>
						<td>
							@if ($root_id == 1)
							<a href="{{ url('categorias/?root_id='.$categoria->id) }}">{{ $categoria->name }}</a>
							@else
							{{ $categoria->name }}
							@endif
						</td>
						<td>{{ $categoria->url }}</td>
						<td>
							<div class="btn-group">
                            	        <a href="{{ route('admin.categorias.edit', $categoria->id) }}">
	                                        <i class="icon-pencil"></i> Editar 
	                                    </a>
	                                    |
	                                    <a href="#" data-target='#modal-delete' data-toggle='modal' id="modal" 
	                                    	data-id="{{ $categoria->id }}"
	                                    	data-name="{{ $categoria->name }}"
	                                    	data-url="{{ route('admin.categorias.destroy', $categoria->id) }}">
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
	<script src="{{ asset('admin/assets/global/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/pages/categorias/js/main.js') }}"></script>
@endpush