@extends('admin.layouts.app')

@section('content')

	<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Agregar Sección Producto
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
					{!! Form::open(['route' => ['admin.productos.section.store', $product], 'class' => 'form-horizontal', 'id' => 'formAdd']) !!}

						<div class="form-body">
						
							@include('admin.pages.sectionproducts.partials.form')

						</div>

					{!! Form::close() !!}
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection