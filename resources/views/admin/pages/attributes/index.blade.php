@extends('admin.layouts.app')
	
@section('content')

	<div class="table-toolbar">
        <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
                    <a href="{{ route('admin.attributes.create') }}" id="sample_editable_1_new" class="btn sbold green"> Agregar
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

	<div class="row">
		<div class="col-md-12">

			<table id="attributes" width="100%" class="table table-striped table-bordered table-hover">
				
				<thead>
					<tr>
						<th>Nombre</th>
						<th width="200">Opciones</th>
					</tr>
				</thead>

				<tbody>
					
					@foreach($attributes as $attribute)

					<tr>
						<td>{{ $attribute->name }}</td>
						<td>
							<div class="btn-group">
                    	        <a href="{{ route('admin.attributes.edit', $attribute->id) }}">
                                    <i class="icon-pencil"></i> Editar 
                                </a>
                                |
                                <a href="#" data-target='#modal-delete' data-toggle='modal' id="modal" 
                                	data-id="{{ $attribute->id }}"
                                	data-name="{{ $attribute->name }}"
                                	data-url="{{ route('admin.attributes.destroy', $attribute->id) }}">
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
	
	@include('admin.pages.attributes.delete')

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/pages/atributes/js/main.js') }}"></script>
@endpush