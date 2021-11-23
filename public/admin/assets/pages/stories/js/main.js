$(function(){

	$("#stories").dataTable({
		"paginate": true,
		"searching": true,
		"ordering": true,
		"order": [],
		"info": false,
		"iDisplayLength": 10,
		"aLengthMenu": [[10, 25, 50], [10, 25, 50]],
		"language": {
			"url": "/admin/assets/global/plugins/datatables/Spanish.json"
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