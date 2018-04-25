$(function(){
	/*
	$("#widgets").dataTable({
		"paginate": false,
		"searching": false,
		"ordering": true,
		"order": [],
		"info": false,
		"language": {
			"url": "http://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
		},
	});
	*/

	$(document).on('click', '#modal' ,function() {
		var id = $(this).data('id');
		var name = $(this).data('name');
		var url = $(this).data('url');

		$("#nombre").html(name);
		$("#widget-form-delete").attr('action', 'panel/widgets/'+id);
		$("#form-delete").attr('action', url);
	});

});