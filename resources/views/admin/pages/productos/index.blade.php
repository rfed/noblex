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
                    <a href="{{ route('productos.create') }}" id="sample_editable_1_new" class="btn sbold green"> Agregar
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
						<th>active</th>
						<th></th>					
					</tr>
				</thead>

				<tbody>
					
					<tr>
						<td>Producto 1</td>
						<td>SKU</td>
						<td>Categoria</td>
						<td>Active</td>
						<td>
							<div class="btn-group">
                            	<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Acciones
                                	<i class="fa fa-angle-down"></i>
                            	</button>
	                            <ul class="dropdown-menu pull-left" role="menu">
	                            	<li>
	                                    <a href="#">
	                                        <i class="icon-eye"></i> Visualizar 
	                                    </a>
	                                </li>
	                                <li>
	                                    <a href="#">
	                                        <i class="icon-pencil"></i> Editar 
	                                    </a>
	                                </li>
	                                <li>
	                                    <a href="#" data-target='#modal-delete' data-toggle='modal' id="modal">
	                                        <i class="icon-trash"></i> Eliminar 
	                                    </a>
	                                </li>
	                            </ul>
                        	</div>
                    	</td>
					</tr>

				</tbody>

			</table>

		</div>
	</div>
	
	@include('admin.pages.productos.delete')

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/global/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/pages/productos/js/main.js') }}"></script>
@endpush