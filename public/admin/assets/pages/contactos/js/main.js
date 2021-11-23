$(function(){

	$("#contacto").dataTable({
		dom: "<'row'<'col-sm-6'l><'col-sm-3 text-center'B><'col-sm-3'f>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-5'i><'col-sm-7'p>>", 
        buttons: [
	        {
	        	extend: 'excel',
	        	text: 'Exportar Excel',
	        	className: 'btn btn-success btn-sm',
	        	title: 'Contactos',
	            init: function(api, node, config) {
			       $(node).removeClass('dt-button')
			    },
	        }
        ],
        "columnDefs": [
			{ "width": "15%", "targets": 0 },
			{ "width": "15%", "targets": 1 },
			{ "width": "25%", "targets": 2 },
			{ "width": "45%", "targets": 3 }
		],
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
	});
});