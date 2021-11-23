$(function(){

	var currentFile = '';
	var arr_image = [];
	if($('#image').length < 1){
		return false;
	}
	var image = new Dropzone('#image', {
		'url': '/panel/stories/storiesUpload',
		'paramName': 'image',
		//'autoProcessQueue': false,
		//'addRemoveLinks': true,
		//'dictRemoveFile': 'Eliminar imagen',
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