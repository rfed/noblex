@extends('admin.layouts.app')

@section('content')

<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Resultado de importación
				</div>
			</div>

			<div class="portlet-body form">

				<table id="productos" width="100%" class="table table-striped table-bordered table-hover">
					
					<thead>
						<tr>
							<th>SKU</th>
							<th>Resultado</th>
						</tr>
					</thead>

					<tbody>

						@foreach($importedProducts as $sku=>$result)
						
							<tr>
								<td>{{ $sku }}</td>
								<td>{{ $result }}</td>
							</tr>

						@endforeach

					</tbody>

				</table>

				<div class="form-actions">
					<div class="row">
						<div class="col-md-12 text-center">
							<a href="{{ route('admin.productos.index') }}" type="button" class="btn blue">Continuar</a>
						</div>
					</div>
				</div>	

			</div>
		</div>
	</div>

@endsection