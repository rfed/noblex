function submitNewsletter()
{
	let name = $("#name").val();
	let email = $("#email").val();
	let token = $("input[name='_token']").val();

	$("#submit-newsletter").prop('disabled', true);
	$("#submit-newsletter").val('Enviando...');

	$.ajax({
		url: '/newsletter',
		type: 'POST',
		dataType: 'json',
		data: {
			name: name,
			email: email,
			captcha: grecaptcha.getResponse(),
			_token: token
		},
	})
	.done(function(data) {
		//console.log(data.error);

		$("#submit-newsletter").prop('disabled', false);
		$("#submit-newsletter").val('Enviar');
		$('.exito').css('display', 'none');
		$(".msgError").find('li').remove();
		$(".msgError").css('display', 'none');

		if(data.error)
		{
			$(".msgError").css('display', 'block');

			for(let index in data.error) {
				let value = data.error[index];

				$(".msgError").append("<li style='color:red'>"+value+"</li>");	
			}
		} 
		else
		{
			$("#name").val('');
			$("#email").val('');
			grecaptcha.reset();

			$('.exito').append('Te has inscripto correctamente!');
			$('.exito').css('display', 'block');
		}

	})
	.fail(function(xhr, status, error) {
		console.log(xhr.responseText);
	});
	
}