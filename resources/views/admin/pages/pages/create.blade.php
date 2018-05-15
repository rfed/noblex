@extends('admin.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/productos/dropzone/dropzone.min.css') }}">
@endpush

@section('content')
	
	<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Agregar pagina
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
				{!! Form::open(['route' => 'admin.pages.store', 'class' => 'form-horizontal form-row-seperated']) !!}

					@include('admin.pages.pages.partials.form')
					
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								{!! Form::button('<i class="fa fa-check"></i> Agregar', ['type' => 'submit', 'class' => 'btn blue', 'id' => 'submitFile']) !!}

								<a href="{{ route('admin.pages.index') }}" type="button" class="btn default">Volver</a>

							</div>
						</div>
					</div>
				{!! Form::close() !!}
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/pages/pages/js/jquery.stringtoslug.min.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/pages/js/speakingurl.min.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/pages/dropzone/dropzone.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/pages/tinymce/tinymce.min.js') }}"></script>
	

	<script>
		$(function() {

			$("#title").stringToSlug();
			
			tinymce.init({ 
				menubar: false,
				selector:'textarea',
				toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent image code',
  				plugins: 'code image',
  				images_upload_url: '{{ url('panel/pages/upload') }}'
			});

		});
	</script>
@endpush