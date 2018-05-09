$(function(){
	$('#formRegistro').submit(function() {
		$('#submitRegistro').prop('disabled', true);
		$('#submitRegistro').attr('value', 'Registrando...');
	});
});