@extends('admin.layouts.app')
	
@section('content')

	<div class="row">
		<div class="col-md-12">

			<table id="customers" width="100%" class="table table-striped table-bordered table-hover">
				
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Email</th>
						<th>Género</th>
						<th>Fecha de Nacimiento</th>
					</tr>
				</thead>

				<tbody>
					
					@foreach($customers as $customer)

					<tr>
						<td>{{ $customer->firstname }}</td>
						<td>{{ $customer->lastname }}</td>
						<td>{{ $customer->email }}</td>
						<td>{{ $customer->gender  }}</td>
						<td>{{ $customer->birth->format('d-m-Y') }}</td>
					</tr>

					@endforeach

				</tbody>

			</table>

		</div>
	</div>

@endsection

@push('scripts')
    <script src="{{ asset('admin/assets/pages/customers/js/main.js') }}"></script>
@endpush