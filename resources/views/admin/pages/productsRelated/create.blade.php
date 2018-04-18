@extends('admin.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/productos/css/main.css') }}">
@endpush

@section('content')

<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Relacionar productos
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
					{!! Form::open(['route' => 'admin.productos.relacionados.store', 'class' => 'form-horizontal', 'id' => 'formAdd']) !!}

						<div class="form-body">
						
							@include('admin.pages.productsRelated.partials.form', [
								'producto' 	=> $producto_id,
								'productos'	=> $productos							
							])

						</div>

					{!! Form::close() !!}
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection

@push('scripts')
	
	<script>

		$('.selectpicker').change(function () {
	        //var optionSelected = $(this).find("option:selected").val();

	        /*$("<input type='hidden' name='product_relationship_id[]' value='"+optionSelected+"'>").appendTo('#products_relationship');*/

	        //console.log(optionSelected);
	        //$("input[type='hidden'][name='product_relationship_id[]']").attr('value', optionSelected);
	   });

	</script>
	
@endpush