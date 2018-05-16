@extends('admin.layouts.app')
	
@section('content')

	<div class="table-toolbar">
		<div class="row">
			<div class="col-md-6">
				<div class="btn-group">
					<a href="{{ route('admin.productos.create') }}" id="sample_editable_1_new" class="btn sbold green"> Agregar
						<i class="fa fa-plus"></i>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">

			<table id="productos" width="100%" class="table table-striped table-bordered table-hover">
				
				<thead>
					<tr>
						<th>Nombre</th>
						<th>SKU</th>
						<th>Categoria</th>
						<th>activo</th>
						<th>Opciones</th>					
					</tr>
				</thead>

				<tbody>

					@foreach($productos as $producto)
					
						<tr>
							<td>{{ $producto->name }}</td>
							<td>{{ $producto->sku }}</td>
							<td>{{ $producto->category->name }}</td>
							<td>{{ $producto->active }}</td>
							<td>
								<div class="btn-group">
                    	        <a href="{{ route('admin.productos.edit', $producto->id) }}">
                                    <i class="icon-pencil"></i> Editar 
                                </a>
                                |
                                <a href="#" data-target='#modal-delete' data-toggle='modal' id="modal" 
                                	data-id="{{ $producto->id }}"
									data-name="{{ $producto->name }}"
									data-url="{{ route('admin.productos.destroy', $producto->id) }}">
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
	
	@include('admin.pages.products.delete')

@endsection

@push('scripts')
    <script src="{{ asset('admin/assets/pages/productos/js/main.js') }}"></script>
@endpush