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
						<th>Asunto</th>
						<th>Mensaje</th>
					</tr>
				</thead>

				<tbody>
					
					@foreach($contactos as $contacto)

					<tr>
						<td>{{ $contacto->firstname.' '.$contacto->lastname }}</td>
						<td>{{ $contacto->email }}</td>
						<td>{{ $contacto->subjects->title }}</td>
						<td>{{ $contacto->message }}</td>
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
    <script src="{{ asset('admin/assets/pages/contactos/js/main.js') }}"></script>
@endpush