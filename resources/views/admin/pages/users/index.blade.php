@extends('admin.layouts.app')
	
@section('content')

	<div class="table-toolbar">
        <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
                    <a href="{{ route('admin.users.create') }}" id="sample_editable_1_new" class="btn sbold green"> Agregar
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

	<div class="row">
		<div class="col-md-12">

			<table id="users" width="100%" class="table table-striped table-bordered table-hover">
				
				<thead>
					<tr>
						<th>Nombre</th>
						<th width="200">Opciones</th>
					</tr>
				</thead>

				<tbody>
					
					@foreach($users as $user)

					<tr>
						<td>{{ $user->name }}</td>
						<td>
							<div class="btn-group">
                    	        <a href="{{ route('admin.users.edit', $user->id) }}">
                                    <i class="icon-pencil"></i> Editar 
                                </a>
                                @if ($user->id != 1)
                                |
                                <a href="#" data-target='#modal-delete' data-toggle='modal' id="modal" 
                                	data-id="{{ $user->id }}"
                                	data-name="{{ $user->name }}"
                                	data-url="{{ route('admin.users.destroy', $user->id) }}">
                                    <i class="icon-trash"></i> Eliminar 
                                </a>
	                            @endif
                        	</div>
                    	</td>
					</tr>

					@endforeach

				</tbody>

			</table>

		</div>
	</div>
	
	@include('admin.pages.users.delete')

@endsection

@push('scripts')
    <script src="{{ asset('admin/assets/pages/marcas/js/main.js') }}"></script>
@endpush