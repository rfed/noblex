$(function(){

	/*$("#categorias").dataTable({
		"paginate": true,
		"searching": true,
		"ordering": true,
		"order": [],
		"info": false,
		"iDisplayLength": 5,
		"aLengthMenu": [[5, 10, 25], [5, 10, 25]],
		"language": {
			"url": "http://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
		},
	});*/

	$(document).on('click', '#modal' ,function() {
		var id = $(this).data('id');
		var name = $(this).data('name');
		var url = $(this).data('url');

		$("#nombre").html(name);
		$("#form-delete").attr('action', url);
	});

});