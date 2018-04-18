@extends('admin.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/productos/dropzone/dropzone.min.css') }}">
@endpush

@section('content')

<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Agregar Imagenes
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
					{!! Form::open(['route' => 'admin.productos.files.store', 'class' => 'form-horizontal', 'id' => 'formAdd']) !!}
				
						<div class="form-body">
							
							@include('admin.pages.productsMedia.partials.form', ['producto' => $product])

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
		
		var product_id = {{$product}};

		var image = new Dropzone('#images', {
			'url': 'productos/files',
			'paramName': 'image',
			'autoProcessQueue': false,
			/*'params': {
		        product_id: product_id  // Una forma de enviar parametros al post que realiza dropzone automaticamente al subir imagen.
		    },*/
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			'dictDefaultMessage': 'Arrastra o haga click aquí para subir las imagenes',
		});

		image.on("sending",function(file,xhr,data){
		   	data.append("product_id", product_id);  // Otra forma de envio de parametros cuando dropzone hace el post al subir una imagen.
		});

		image.on("addedfile", function() {
			$('.dz-progress').hide();
		});

		var featured_image = new Dropzone('#featured-image', {
			'url': 'productos/files',
			'paramName': 'featured_image',
			'autoProcessQueue': false,
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'maxFiles': 1,
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			'dictDefaultMessage': 'Arrastra o haga click aquí para subir la imagen destacada'
		});

		featured_image.on("sending",function(file,xhr,data){
		   	data.append("product_id", product_id);  // Otra forma de envio de parametros cuando dropzone hace el post al subir una imagen.
		});

		featured_image.on("addedfile", function() {
			$('.dz-progress').hide();
		});

		var documento = new Dropzone('#document', {
			'url': 'productos/files',
			'paramName': 'document',
			'autoProcessQueue': false,
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar documento',
			'acceptedFiles': 'application/pdf',
			'maxFiles': 1,
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			'dictDefaultMessage': 'Arrastra o haga click aquí para subir el documento'
		});

		documento.on("sending",function(file,xhr,data){
		   	data.append("product_id", product_id);  // Otra forma de envio de parametros cuando dropzone hace el post al subir una imagen.
		});

		documento.on("addedfile", function() {
			$('.dz-progress').hide();
		});

		Dropzone.autoDiscover = false;

		featured_image.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de una imagen.'

			$(".dz-error-message:last > span").text(msg);
		});

		documento.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de un archivo.'

			$(".dz-error-message:last > span").text(msg);
		});

		$("#submitFiles").on('click', function(){
			image.processQueue();
			featured_image.processQueue();
			documento.processQueue();
		});

	</script>
@endpush