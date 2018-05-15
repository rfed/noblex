$(function(){

	$("#subjects").dataTable({
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

	$(document).on('click', '#modal' ,function() {
		var id = $(this).data('id');
		var title = $(this).data('title');
		var url = $(this).data('url');

		$("#nombre").html(title);
		$("#form-delete").attr('action', url);
	});
});