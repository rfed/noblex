$(function(){

	if( $('#manuales').length ){

		$('#manuales').dataTable({
			responsive: true,
			dom: 'fl<"table_wrapper"t>ip',
			language: {
				searchPlaceholder: 'ej: 32LC841HT',
				search: 'Buscar por número de modelo:',
				lengthMenu: 'Todos los archivos',
				info: 'Mostrando _START_ de _END_ archivos',
				paginate: {
					previous: 'Anterior',
					next: 'Siguiente'
				}
			},
			"columnDefs": [
			    { "searchable": true, "targets": 0 },
			    { "searchable": false, "targets": 1 },
			    { "searchable": false, "targets": 2 },
			    { "searchable": false, "targets": 3 },
			    { "searchable": false, "targets": 4 },
			    { "searchable": false, "targets": 5 },
			],
		})
	}
});