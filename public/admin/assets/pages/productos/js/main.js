$(function(){

	$("#productos").dataTable({
		"paginate": true,
		"searching": true,
		"ordering": true,
		"order": [],
		"info": false,
		"iDisplayLength": 5,
		"aLengthMenu": [[5, 10, 25], [5, 10, 25]],
		"columnDefs": [
			{ "width": "30%", "targets": 0 },
			{ "width": "15%", "targets": 1 },
			{ "width": "30%", "targets": 2 },
			{ "width": "5%", "targets": 3 },
			{ "width": "20%", "targets": 4 }
		],
		"language": {
			"url": "http://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
		},
	});

	$(document).on('click', '#modal' ,function() {
		var id = $(this).data('id');
		var name = $(this).data('name');
		var url = $(this).data('url');

		$("#nombre").html(name);
		$("#form-delete").attr('action', url);
	});
});