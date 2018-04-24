@extends('admin.layouts.app')

@section('content')

<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Editar Producto
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
                    {!! Form::model($producto, ['route' => ['admin.productos.update', $producto->id], 'class' => 'form-horizontal form-row-seperated', 'method' => 'PUT']) !!}

						<div class="form-body">
						
							@include('admin.pages.products.partials.form')

						</div>
						{!! Form::hidden('id', $producto->id) !!}
					{!! Form::close() !!}
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/pages/productos/js/app.js') }}"></script>

	<script>
		@if(!empty($subcategoria) && !empty($categoria));
			$(document).ready(function(){
				subcategorias({{ $categoria->id }}, {{ $subcategoria->id}})
			});
		@endif
	</script>
@endpush