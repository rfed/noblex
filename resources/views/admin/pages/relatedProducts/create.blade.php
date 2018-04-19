@extends('admin.layouts.app')

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
					{!! Form::open(['route' => ['admin.productos.relacionados.store', $product], 'class' => 'form-horizontal', 'id' => 'formAdd']) !!}

						<div class="form-body">
						
							@include('admin.pages.relatedProducts.partials.form', [
								'producto' 	=> $product,
								'productos'	=> $productos							
							])

						</div>

					{!! Form::close() !!}
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection