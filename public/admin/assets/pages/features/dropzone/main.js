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

	var arr_image = [];
	var image = new Dropzone('#image', {
		'url': '../features/featuresUpload',
		'paramName': 'image',
		//'autoProcessQueue': false,
		'addRemoveLinks': true,
		'dictRemoveFile': 'Eliminar imagen',
		'acceptedFiles': 'image/*',
		'maxFiles': 1,
		'headers': {
			'X-CSRF-TOKEN': $("input[name='_token']").val()
		},
		'dictDefaultMessage': 'Arrastra o haga click aquí para subir la imagen',
		init: function() {
			myDropzone = this;

			this.on("success", function (file, responseText) {
		        $("input[name='image']").val(responseText);
		        arr_image.push({ 'id': file.upload.uuid, 'image': responseText });
		    });	
		}
	});


	image.on("removedfile", function(file, res) {
		var idRemove = file.upload.uuid;
		for(var item in arr_image)
		{
			if(arr_image[item].id == idRemove)
			{
				$.ajax({
					url: '../features/deleteFeaturesImage',
					type: 'POST',
					dataType: 'json',
					data: {
						image: arr_image[item].image,
						_token: $("input[name='_token']").val(),
					}
				})
				.done(function(data) {
					//console.log(data);
				})
				.fail(function(xhr, status, error) {
					console.log(xhr.responseText);
				});
			}

		}
	});

	image.on("addedfile", function(file, res) {
		$('.dz-progress').hide();
	});

	image.on('error', function(file, res) {
		var msg;

		if(res == 'You can not upload any more files.')
			msg = 'No puedes subir mas de una imagen.'

		$(".dz-error-message:last > span").text(msg);
	});

	Dropzone.autoDiscover = false;

});
