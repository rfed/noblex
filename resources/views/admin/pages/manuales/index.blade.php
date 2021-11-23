@extends('admin.layouts.app')
	
@section('content')

	<div class="row">
		<div class="col-md-12">

			<table id="manuales" width="100%" class="table table-striped table-bordered table-hover">
				
				<thead>
					<tr>
						<th>Nombre</th>
						<th>SKU</th>
						<th>Manual</th>
					</tr>
				</thead>

				<tbody>
					
					@foreach($productos as $producto)

					<tr>
						<td>{{ $producto->name }}</td>
						<td>{{ $producto->sku }}</td>
						<td><a href="{{ url("storage/$producto->manual") }}">Visualizar</a></td>
					</tr>

					@endforeach

				</tbody>

			</table>

		</div>
	</div>

@endsection

@push('scripts')
    <script src="{{ asset('admin/assets/pages/manuales/js/main.js') }}"></script>
@endpush