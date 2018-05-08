$(function(){
	$('#formPerfil').submit(function() {
		$('#submitPerfil').prop('disabled', true);
		$('#submitPerfil').attr('value', 'Actualizando...');
	});
});