$(function(){
	$('#formPasswordReset').submit(function() {
		$('#submitPasswordReset').prop('disabled', true);
		$('#submitPasswordReset').attr('value', 'Enviando...');
	});
});