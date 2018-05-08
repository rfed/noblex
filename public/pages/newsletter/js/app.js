$(function(){
	$('#formNewsletter').submit(function() {
		$('#submit').prop('disabled', true);
		$('#submit').attr('value', 'Enviando...');
	});
});