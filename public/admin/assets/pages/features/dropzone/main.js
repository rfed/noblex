$(function() {

	$("#formCreate").on('submit', function(e){
		e.preventDefault();

		var name = $("input[name='name']").val();
		var description = $("textarea[name='description']").val();
		var image = $("input[name='image']").val();
		var _token = $("input[name='_token']").val();

		$.ajax({
			url: '../features',
			type: 'POST',
			dataType: 'json',
			data: {
				name: name,
				description: description,
				image: image,
				_token: _token
			},
		})
		.done(function(json) {

			$(".msg").html('')

			if(json.errorValidation)
			{
				for(var i in json.errorValidation)
				{
					input_name = json.errorValidation[i];
					$('.'+i).find(".msg").text(input_name);
					$('.'+i).addClass('has-error');
				}
						
			}else {
				toastr.success(json.message);
				setTimeout(function(){ 
					window.location.href = json.redirect; 
				}, 1000)
			}
		})
		.fail(function(xhr, status, error) {
			console.log(xhr.responseText);
		});	

	});

	var currentFile = '';
	var arr_image = [];
	var image = new Dropzone('#image', {
		'url': '/panel/features/featuresUpload',
		'paramName': 'image',
		//'autoProcessQueue': false,
		'addRemoveLinks': true,
		'dictRemoveFile': 'Eliminar imagen',
		'acceptedFiles': 'image/*',
		'maxFiles': 1,
		'headers': {
			'X-CSRF-TOKEN': $("input[name='_token']").val()
		},
		'dictDefaultMessage': 'Haga click aquí para subir la imagen',
		'clickable' : '#loader',
		'previewTemplate': '<div class="dz-preview dz-file-preview"><img data-dz-thumbnail /><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div></div>',
		'thumbnailMethod': 'contain',
		'thumbnailWidth': 600,
		'thumbnailHeight': 400,
		init: function() {
			myDropzone = this;

			// Esto hace un post al metodo 'sectionUplaod' y responseText es lo que devuelve el metodo, en este caso el nombre de la imagen encriptada por laravel y guardada en el storage.
			this.on("success", function (file, responseText) {
		        $("input[name='image']").val(responseText);
		        arr_image.push({ 'id': file.upload.uuid, 'image': responseText });
		    });	
		}
	});

	image.on("addedfile", function(file, res) {
		if (currentFile) {
			this.removeFile(currentFile);
		}
		currentFile = file;
		$('.dz-progress').hide();
	});

	image.on('error', function(file, res) {
		var msg;

		if(res == 'You can not upload any more files.')
			msg = 'No puedes subir mas de una imagen.'

		$(".dz-error-message:last > span").text(msg);
	});

	var fileName = $('#currentImage').val();
	if (fileName) {
	    var mockFile = { name: fileName, size: 12345 };
		
		image.emit("addedfile", mockFile);
		image.emit("thumbnail", mockFile, "/storage/" + fileName);

		currentFile = mockFile;
	}

	Dropzone.autoDiscover = false;

});
