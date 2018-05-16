@extends('admin.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/features/dropzone/dropzone.min.css') }}">
@endpush

@section('content')

<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
</ul>
<!-- BEGIN FORM-->
{!! Form::model($page, ['route' => ['admin.pages.update', $page->id], 'class' => 'form-horizontal form-row-seperated', 'method' => 'PUT']) !!}

	<!-- END FORM-->
	<div class="tab-content">
		
		<div class="tab-pane active" id="tab-general">
			
			<div class="portlet box yellow">

				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-plus"></i> Editar pagina
					</div>
				</div>

				<div class="portlet-body form" id="institucional">
					@include('admin.pages.pages.partials.form')
				</div>
			</div>

		</div>

		<div class="form-actions">
			<div class="row">
				<div class="col-md-offset-3 col-md-9">
					@isset($page)
						{!! Form::button('<i class="fa fa-check"></i> Editar', ['type' => 'submit', 'class' => 'btn yellow', 'id' => 'submitFile']) !!}
					@else
						{!! Form::button('<i class="fa fa-check"></i> Agregar', ['type' => 'submit', 'class' => 'btn blue', 'id' => 'submitFile']) !!}
					@endisset

					<a href="{{ route('admin.pages.index') }}" type="button" class="btn default">Volver</a>

				</div>
			</div>
    	</div>
	</div>
{!! Form::close() !!}
@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/pages/pages/js/jquery.stringtoslug.min.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/pages/js/speakingurl.min.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/pages/dropzone/dropzone.js') }}"></script>	
    <script src="{{ asset('admin/assets/pages/pages/js/main.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/pages/tinymce/tinymce.min.js') }}"></script>

	<script>
		$(function() {
			$("#title").stringToSlug();

			tinymce.init({ 
				menubar: false,
				selector:'textarea',
				toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent image link unlink code',
  				plugins: 'code image link',
  				images_upload_url: '{{ url('panel/pages/upload') }}',
  				content_css: '/assets/css/styles.css',
  				body_id: 'institucional',
  				height: '500px'
			});			
		});
	</script>
@endpush