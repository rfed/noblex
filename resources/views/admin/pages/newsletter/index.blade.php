@extends('admin.layouts.app')
	
@push('styles')
	<link href="{{ asset('admin/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/global/css/plugins.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

	<div class="row">
		<div class="col-md-12">

			<table id="newsletter" width="100%" class="table table-striped table-bordered table-hover">
				
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Email</th>
						<th>Fecha de suscripción</th>
					</tr>
				</thead>

				<tbody>
					
					@foreach($newsletters as $newsletter)

					<tr>
						<td>{{ $newsletter->name }}</td>
						<td>{{ $newsletter->email }}</td>
						<td>{{ $newsletter->created_at->format('d-m-Y H:i:s') }}</td>
					</tr>

					@endforeach

				</tbody>

			</table>

		</div>
	</div>

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/global/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/pages/newsletter/js/main.js') }}"></script>
@endpush