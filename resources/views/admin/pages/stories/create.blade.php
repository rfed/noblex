@extends('admin.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/productos/dropzone/dropzone.min.css') }}">
@endpush

@section('content')
	
	<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Agregar novedad
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
				{!! Form::open(['route' => 'admin.stories.store', 'class' => 'form-horizontal form-row-seperated']) !!}

					@include('admin.pages.stories.partials.form')
					
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								{!! Form::button('<i class="fa fa-check"></i> Agregar', ['type' => 'submit', 'class' => 'btn blue', 'id' => 'submitFile']) !!}

								<a href="{{ route('admin.stories.index') }}" type="button" class="btn default">Volver</a>

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
	<script src="{{ asset('admin/assets/pages/stories/js/jquery.stringtoslug.min.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/stories/js/speakingurl.min.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/stories/dropzone/dropzone.js') }}"></script>
	

	<script>
		$(function() {

			$("#title").stringToSlug();
			
		});
	</script>
@endpush