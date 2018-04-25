$(function(){

	// $("#formCreate").on('submit', function(e){
	// 	e.preventDefault();

	// 	var name = $("input[name='name']").val();
	// 	var _token = $("input[name='_token']").val();

	// 	$.ajax({
	// 		url: '../attributes',
	// 		type: 'POST',
	// 		dataType: 'json',
	// 		data: {
	// 			name: name,
	// 			_token: _token
	// 		},
	// 	})
	// 	.done(function(json) {

	// 		$(".msg").html('')

	// 		if(json.errorValidation)
	// 		{
	// 			for(var i in json.errorValidation)
	// 			{
	// 				input_name = json.errorValidation[i];
	// 				$('.'+i).find(".msg").text(input_name);
	// 				$('.'+i).addClass('has-error');
	// 			}
						
	// 		}else {
	// 			toastr.success(json.message);
	// 			setTimeout(function(){ 
	// 				window.location.href = json.redirect; 
	// 			}, 1000)
	// 		}
	// 	})
	// 	.fail(function(xhr, status, error) {
	// 		console.log(xhr.responseText);
	// 	});	

	// });

	$(document).on('click', '#modal' ,function() {
		var id = $(this).data('id');
		var name = $(this).data('name');
		var url = $(this).data('url');

		$("#nombre").html(name);
		$("#form-delete").attr('action', url);
	});
});