$(function(){

	$("#groups").dataTable({
		"paginate": true,
		"searching": true,
		"ordering": true,
		"order": [],
		"info": false,
		"iDisplayLength": 25,
		"aLengthMenu": [[25, 50, 100], [25, 50, 100]],
		"language": {
			"url": "http://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
		},
	});

	$("#formCreate").on('submit', function(e){
		e.preventDefault();

		var name = $("input[name='name']").val();
		var _token = $("input[name='_token']").val();

		$.ajax({
			url: '../groups',
			type: 'POST',
			dataType: 'json',
			data: {
				name: name,
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

	$(document).on('click', '#modal' ,function() {
		var id = $(this).data('id');
		var name = $(this).data('name');
		var url = $(this).data('url');

		$("#nombre").html(name);
		$("#form-delete").attr('action', url);
	});
});