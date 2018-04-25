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
					{!! Form::open(['route' => ['admin.productos.files.store', $product], 'class' => 'form-horizontal', 'id' => 'formAdd']) !!}
				
						<div class="form-body">
							
							@include('admin.pages.productsMedia.partials.form')

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
			'url': '../files',
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

		var image_featured_background = new Dropzone('#image_featured_background', {
			'url': '../files',
			'paramName': 'image_featured_background',
			'autoProcessQueue': false,
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'maxFiles': 1,
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			'dictDefaultMessage': 'Arrastra o haga click aquí para subir la imagen destacada de fondo'
		});

		image_featured_background.on("sending",function(file,xhr,data){
		   	data.append("product_id", product_id);  // Otra forma de envio de parametros cuando dropzone hace el post al subir una imagen.
		});

		image_featured_background.on("addedfile", function() {
			$('.dz-progress').hide();
		});

		var image_featured = new Dropzone('#image_featured', {
			'url': '../files',
			'paramName': 'image_featured',
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

		image_featured.on("sending",function(file,xhr,data){
		   	data.append("product_id", product_id);  // Otra forma de envio de parametros cuando dropzone hace el post al subir una imagen.
		});

		image_featured.on("addedfile", function() {
			$('.dz-progress').hide();
		});

		var image_thumb = new Dropzone('#image_thumb', {
			'url': '../files',
			'paramName': 'image_thumb',
			'autoProcessQueue': false,
			'addRemoveLinks': true,
			'dictRemoveFile': 'Eliminar imagen',
			'acceptedFiles': 'image/*',
			'maxFiles': 1,
			'headers': {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			'dictDefaultMessage': 'Arrastra o haga click aquí para subir la imagen thumb'
		});

		image_thumb.on("sending",function(file,xhr,data){
		   	data.append("product_id", product_id);  // Otra forma de envio de parametros cuando dropzone hace el post al subir una imagen.
		});

		image_thumb.on("addedfile", function() {
			$('.dz-progress').hide();
		});
	
		image_featured_background.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de una imagen.'

			$(".dz-error-message > span").text(msg);
		});

		image_featured.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de una imagen.'

			$(".dz-error-message > span").text(msg);
		});

		image_thumb.on('error', function(file, res) {
			var msg;

			if(res == 'You can not upload any more files.')
				msg = 'No puedes subir mas de una imagen.'

			$(".dz-error-message > span").text(msg);
		});

		Dropzone.autoDiscover = false;
		
		$("#submitFiles").on('click', function(){
			image.processQueue();
			image_featured.processQueue();
			image_featured_background.processQueue();
			image_thumb.processQueue();
		});

	</script>
@endpush