@extends('admin.layouts.app')
	
@section('content')

	<div class="row">
		<div class="col-md-12">

			<table id="contacto" width="100%" class="table table-striped table-bordered table-hover">
				
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
						<td>{{ $contacto->subject->title }}</td>
						<td>{{ $contacto->message }}</td>
					</tr>

					@endforeach

				</tbody>

			</table>

		</div>
	</div>

@endsection

@push('scripts')
    <script src="{{ asset('admin/assets/pages/contactos/js/main.js') }}"></script>
@endpush