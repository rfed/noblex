$(function(){
	$('#formRegistro').submit(function() {
		$('#submit').prop('disabled', true);
		$('#submit').attr('value', 'Registrando...');
	});
});