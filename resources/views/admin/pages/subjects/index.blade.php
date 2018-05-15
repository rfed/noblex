@extends('admin.layouts.app')
	
@push('styles')
	<link href="{{ asset('admin/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/global/css/plugins.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

	<div class="table-toolbar">
        <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
                    <a href="{{ route('admin.subjects.create') }}" id="sample_editable_1_new" class="btn sbold green"> Agregar
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

	<div class="row">
		<div class="col-md-12">

			<table id="subjects" width="100%" class="table table-striped table-bordered table-hover">
				
				<thead>
					<tr>
						<th>Titulo</th>
						<th>Email</th>
						<th width="200">Opciones</th>
					</tr>
				</thead>

				<tbody>
					
					@foreach($subjects as $subject)

					<tr>
						<td>{{ $subject->title }}</td>
						<td>{{ $subject->email_subjects->pluck('email')->implode(', ') }}</td>
						<td>
							<div class="btn-group">
                    	        <a href="{{ route('admin.subjects.edit', $subject->id) }}">
                                    <i class="icon-pencil"></i> Editar 
                                </a>
                                |
                                <a href="#" data-target='#modal-delete' data-toggle='modal' id="modal" 
                                	data-id="{{ $subject->id }}"
                                	data-title="{{ $subject->title }}"
                                	data-url="{{ route('admin.subjects.destroy', $subject->id) }}">
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
	
	@include('admin.pages.subjects.delete')

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/global/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/pages/subjects/js/main.js') }}"></script>
@endpush