$(function(){

	var current_image = '';
	var idfile = {};

	var image = new Dropzone('#image', {
		'url': '/panel/categorias/categoriasUpload',
		'paramName': 'image',
		//'autoProcessQueue': false,
		'addRemoveLinks': true,
		'dictRemoveFile': 'Eliminar imagen',
		'acceptedFiles': 'image/*',
		'maxFiles': 1,
		'headers': {
			'X-CSRF-TOKEN': $("input[name='_token']").val()
		},
		//'dictDefaultMessage': 'Haga click aquí para subir la imagen',
		'clickable' : '#loader-image',
		'previewTemplate': '<div class="dz-preview dz-file-preview"><img data-dz-thumbnail /><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div></div>',
		'thumbnailMethod': 'contain',
		'thumbnailWidth': 600,
		'thumbnailHeight': 400,
		init: function() {
			myDropzone = this;

			this.on("success", function (file, responseText) {
				$("input[name='image']").val(responseText);
		        idfile = {'id' : file.upload.uuid, 'image' : responseText};
		    });
		}
	});

	image.on("addedfile", function(file, res) {
		if(current_image) {
			this.removeFile(current_image);
		}

		current_image = file;
		$('.dz-progress').hide();
	});

	image.on("removedfile", function(file, res) {

		if(idfile.image)  
			var image = idfile.image;
		else
			var image = $("input[name='image']").val(); 

		$.ajax({
			url: '/panel/categorias/deleteCategoriesImage',
			type: 'POST',
			dataType: 'json',
			data: {
				image: image,
				_token: $("input[name='_token']").val(),
			}
		})
		.done(function(data) {
			console.log(data);
			$("input[name='image']").val('');
		})
		.fail(function(xhr, status, error) {
			console.log(xhr.responseText);  
		});
	
	});

	// Si existe una imagen guardada en el input image, current_image tiene el valor del mockFile, 
	// es decir todos los datos de la imagen que se guardó anteriormente, y emito los eventos.
	var fileName = $("input[name='image']").val();
	if (fileName) {
	    var mockFile = { name: fileName, size: 12345 };

		image.emit("addedfile", mockFile);
		image.emit("thumbnail", mockFile, "/storage/" + fileName);

		current_image = mockFile;
	}



	//********* BANNER *********//

	var current_banner = '';
	var idbanner = {};

	var banner = new Dropzone('#banner', {
		'url': '/panel/categorias/categoriasUpload',
		'paramName': 'banner',
		//'autoProcessQueue': false,
		'addRemoveLinks': true,
		'dictRemoveFile': 'Eliminar imagen',
		'acceptedFiles': 'image/*',
		'maxFiles': 1,
		'headers': {
			'X-CSRF-TOKEN': $("input[name='_token']").val()
		},
		//'dictDefaultMessage': 'Haga click aquí para subir la imagen',
		'clickable' : '#loader-banner',
		'previewTemplate': '<div class="dz-preview dz-file-preview"><img data-dz-thumbnail /><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div></div>',
		'thumbnailMethod': 'contain',
		'thumbnailWidth': 600,
		'thumbnailHeight': 400,
		init: function() {
			myDropzone = this;

			this.on("success", function (file, responseText) {
				$("input[name='banner']").val(responseText);
		        idbanner = {'id' : file.upload.uuid, 'image' : responseText};
		    });
		}
	});

	banner.on("removedfile", function(file, res) {

		if(idbanner.image)  
			var image = idbanner.image;
		else
			var image = $("input[name='banner']").val(); 

		$.ajax({
			url: '/panel/categorias/deleteCategoriesImage',
			type: 'POST',
			dataType: 'json',
			data: {
				image: image,
				_token: $("input[name='_token']").val(),
			}
		})
		.done(function(data) {
			console.log(data);
			$("input[name='banner']").val('');
		})
		.fail(function(xhr, status, error) {
			console.log(xhr.responseText);  
		});
	
	});

	// Si existe una imagen guardada en el input image, current_banner tiene el valor del mockFile, 
	// es decir todos los datos de la imagen que se guardó anteriormente, y emito los eventos.
	var fileName = $("input[name='banner']").val();
	if (fileName) {
	    var mockFile = { name: fileName, size: 12345 };

		banner.emit("addedfile", mockFile);
		banner.emit("thumbnail", mockFile, "/storage/" + fileName);

		current_banner = mockFile;
	}

	banner.on("addedfile", function(file, res) {
		if(current_banner) {
			this.removeFile(current_banner);
		}

		current_banner = file;
		$('.dz-progress').hide();
	});


	Dropzone.autoDiscover = false;

});