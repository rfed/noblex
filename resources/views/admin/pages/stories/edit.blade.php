@extends('admin.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/features/dropzone/dropzone.min.css') }}">
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
    <script src="{{ asset('admin/assets/pages/stories/js/main.js') }}"></script>

	<script>
		$(function() {
			$("#title").stringToSlug();
		});
	</script>
@endpush