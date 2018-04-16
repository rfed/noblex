@extends('admin.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/productos/dropzone/dropzone.min.css') }}">
@endpush

@section('content')

<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Agregar Producto
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
					{!! Form::open(['route' => 'admin.productos.store', 'class' => 'form-horizontal']) !!}
						@csrf

						<div class="form-body">
						
							@include('admin.pages.productos.partials.form')

						</div>

					{!! Form::close() !!}
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/pages/productos/dropzone/dropzone.js') }}"></script>
	
	<script>
		
		new Dropzone('.dropzone', {
			'url': 'files',
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			'dictDefaultMessage': 'Arrastra o haga click aquí para subir los archivos'
		});

		Dropzone.autoDiscover = false;	
		
	</script>
@endpush