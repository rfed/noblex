@push('styles')
    <link href="{{ asset('admin/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/global/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/global/css/plugins.min.css') }}" rel="stylesheet" />
@endpush

<div class="table-toolbar">
		<div class="row">
			<div class="col-md-6">
				<div class="btn-group">
					<a href="{{ route('admin.widgets.create', @$categoria ? 'cat='.@$categoria->id : '') }}" id="sample_editable_1_new" class="btn sbold green"> Agregar
						<i class="fa fa-plus"></i>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">

			<table id="widgets" class="table table-striped table-bordered table-hover">
				
				<thead>
					<tr>
						<th width="10"></th>
						<th width="300">Titulo</th>
						<th width="200">Tipo</th>
						<th width="100">Categoria</th>
						<th width="40">Activo</th>
						<th width="140"></th>	
					</tr>
				</thead>

				<tbody id="sortable">

					@foreach($widgets as $widget)
					
						<tr>
							<td>{{ $widget->position }}</td>
							<td>{{ $widget->title }}</td>
							<td>{{ \Config::get("widgets.types")[$widget->type]["text"] }}</td>
							<td>@if($widget->category)<a href="{{ route('admin.categorias.edit', $widget->category_id) }}" >{{ $widget->category->name }}</a>@endif</td>
							<td>{{ $widget->active ? 'Si' : 'No' }}</td>
							<td>
								{!! Form::hidden('id', $widget->id, array('class' => "id")) !!}
								<div class="btn-group">
									<a href="{{ route('admin.widgets.edit', $widget->id) }}">
										<i class="icon-pencil"></i> Editar 
									</a>
									|

									<a href="#" class="delete-widget"
									data-id="{{ $widget->id }}">
										<i class="icon-trash"></i> Eliminar 
									</a>
									
								</div>
	                    	</td>
						</tr>

					@endforeach

				</tbody>

			</table>

		</div>
	</div>
    

@push('scripts')
	<script src="{{ asset('admin/assets/global/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/widgets/js/main.js') }}"></script>

<script>
$.ajaxSetup({
	headers: { "X-CSRF-TOKEN": '{{ csrf_token() }}' }
});
$(document).ready(function(){
	$(document).on('click', '.delete-widget', function(e){
		var id = $(this).data('id');
		var tr = $(this).parent().parent().parent();
		console.log(id);
		console.log($(tr));

		e.preventDefault();
		$.ajax({
			url: '/panel/widgets/' + id,
			type: 'DELETE',
			success: function(result) {
				console.log("HEcho");
				$(tr).remove();
			},
			error: function(error){
				console.log(error);
			}
		});

		return false;
	});
});
</script>

	@if(!@$no_sort)
	<script>
		$.ajaxSetup({
			headers: { "X-CSRF-TOKEN": '{{ csrf_token() }}' }
		});

		$( function() {
			
			$( "#sortable" ).disableSelection();

			$( "#sortable" ).sortable({
				update: function( e, index) {
					var mi_id = $(e.target).find('.id').val();
					var list = [];

					$.each($("#sortable tr"), function(i, el){
						var el_id = $(el).find('.id').val();
						var pos = $(el).index();
						list.push({
							id: el_id,
							position: pos
						})
						$(el).find('td').eq(0).text(pos);
					})
					console.log(list);
					$.ajax({
						url: '/panel/widgets/orden',
						type: 'post',
						data: {widgets:list},
						success: function(result) {
							console.log(result);
						},
						error: function(error){
							console.log(error);
						}
					});
				}
			});
		} );
	</script>
	@endif
@endpush