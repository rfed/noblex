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
						<th width="10">Pos.</th>
						<th width="300">Titulo</th>
						<th width="200">Tipo</th>
						<th width="100">Categoria</th>
						<th width="40">Activo</th>
						<th width="200">Opciones</th>	
					</tr>
				</thead>

				<tbody id="sortable">
					@if (count($widgets))
						@foreach($widgets as $widget)
							@if ($widget->type != 7)
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

										<a href="#" data-target='#modal-delete' data-toggle='modal' id="modal" 
		                                	data-id="{{ $widget->id }}"
		                                	data-name="{{ $widget->title }}"
		                                	data-url="{{ route('admin.widgets.destroy', $widget->id) }}">
		                                    <i class="icon-trash"></i> Eliminar 
		                                </a>
									</div>
		                    	</td>
							</tr>
							@endif
						@endforeach
					@else
					<tr>
						<th colspan="6"><div class="alert alert-warning">Aún no has creado ningún widget.</div></th>
					</tr>
					@endif

				</tbody>

			</table>
		</div>
	</div>
    
@include('admin.pages.widgets.delete')

@push('scripts')
<script src="{{ asset('admin/assets/pages/widgets/js/main.js') }}"></script>

<script>
$.ajaxSetup({
	headers: { "X-CSRF-TOKEN": '{{ csrf_token() }}' }
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