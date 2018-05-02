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
