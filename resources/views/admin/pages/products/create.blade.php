@extends('admin.layouts.app')

@section('content')

<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Agregar producto nuevo
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
					{!! Form::open(['route' => 'admin.productos.store', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

						<div class="form-body">

							<div class="note note-info">
			                    <p> Complete las propiedades del producto y grabe para habilitar las solapas de imagenes, bloques y atributos. </p>
			                </div>
						
							@include('admin.pages.products.partials.form')

						</div>

					{!! Form::close() !!}
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/pages/productos/js/app.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/categorias/js/jquery.stringtoslug.min.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/categorias/js/speakingurl.min.js') }}"></script>

	<script>
		$(function() {
			$("#name").stringToSlug({
				getPut: '#url'
			});
		});
	</script>
@endpush