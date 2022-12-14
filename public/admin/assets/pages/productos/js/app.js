function subcategorias(value, selected)
{
	if(value != '')
	{
		$('#subcategory_id').find('option').not(':first').remove();

		$.ajax({
			url: baseUrl+'/categorias',
			type: 'GET',
			dataType: 'json',
			data: {id_categoria: value}
		})
		.done(function(data) {
			//console.log(data);

			if (data.length > 0) {
				document.querySelector("#subcategory").style.display = 'block';

				data.forEach(dato => {
					$('<option value="'+dato.id+'" '+ (selected && dato.id === selected ? 'selected' : '') + '>'+dato.name+'</option>').insertAfter('#subcategory_id option:first');
				});
			}
			else {
				document.querySelector("#subcategory").style.display = 'none';
			}

		})
		.fail(function(xhr, status, error) {
			console.log(xhr.responseText);
		});
	}
	else
	{
		document.querySelector("#subcategory").style.display = 'none';
	}

}

function removeManual(id_producto)
{
	$.ajax({
		url: '/panel/productos/'+id_producto+'/destroyManual',
		type: 'POST',
		dataType: 'html',
		data: {
			id: id_producto,
			_token: $("input[name='_token']").val()
		},
	})
	.done(function(data) {
		
		if(data == 'true')
		{
			$('#ver-manual').fadeOut(400, function() {
				$(this).remove();
			});
		}

	})
	.fail(function(xhr, status, error) {
		console.log(xhr.responseText);
	});
	
}
