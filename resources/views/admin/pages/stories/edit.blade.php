@extends('admin.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/stories/dropzone/dropzone.min.css') }}">
@endpush

@section('content')

<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
</ul>
<!-- BEGIN FORM-->
{!! Form::model($story, ['route' => ['admin.stories.update', $story->id], 'class' => 'form-horizontal form-row-seperated', 'method' => 'PUT']) !!}

	<!-- END FORM-->
	<div class="tab-content">
		
		<div class="tab-pane active" id="tab-general">
			
			<div class="portlet box yellow">

				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-plus"></i> Editar novedad
					</div>
				</div>

				<div class="portlet-body form">
					@include('admin.pages.stories.partials.form')
				</div>
			</div>

		</div>

		<div class="form-actions">
			<div class="row">
				<div class="col-md-offset-3 col-md-9">
					@isset($story)
						{!! Form::button('<i class="fa fa-check"></i> Editar', ['type' => 'submit', 'class' => 'btn yellow', 'id' => 'submitFile']) !!}
					@else
						{!! Form::button('<i class="fa fa-check"></i> Agregar', ['type' => 'submit', 'class' => 'btn blue', 'id' => 'submitFile']) !!}
					@endisset

					<a href="{{ route('admin.stories.index') }}" type="button" class="btn default">Volver</a>

				</div>
			</div>
    	</div>
	</div>
{!! Form::close() !!}
@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/pages/stories/js/jquery.stringtoslug.min.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/stories/js/speakingurl.min.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/stories/dropzone/dropzone.js') }}"></script>	
	<script src="{{ asset('admin/assets/pages/pages/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/assets/pages/stories/js/app.js') }}"></script>

	<script>
		$(function() {
			$("#title").stringToSlug();

			tinymce.init({ 
				menubar: false,
				selector:'textarea',
				toolbar: 'undo redo styleselect bold italic underline alignleft aligncenter alignright bullist numlist outdent indent image link unlink removeformat code',
  				plugins: 'code image link',
  				images_upload_url: '{{ url('panel/pages/upload') }}',
  				content_css: '/assets/css/styles.css',
  				body_id: 'legales',
  				height: '300px',
  				style_formats: [
					{title: 'Titular 2', format: 'h2'},
					{title: 'Titular 3', format: 'h3'},
					{title: 'Titular 4', format: 'h4'},
					{title: 'Titular 5', format: 'h5'},
					{title: 'Titular 6', format: 'h6'},
					{title: 'Parrafo', block: 'p'}
				]
			});	
		});
	</script>
@endpush