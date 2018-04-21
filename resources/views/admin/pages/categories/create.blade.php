@extends('admin.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/productos/dropzone/dropzone.min.css') }}">
@endpush

@section('content')
	
	<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Agregar categoría
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
				{!! Form::open(['route' => 'admin.categorias.store', 'class' => 'form-horizontal form-row-seperated']) !!}

					@include('admin.pages.categories.partials.form')
					
				{!! Form::close() !!}
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/pages/categorias/js/jquery.stringtoslug.min.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/categorias/js/speakingurl.min.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/categorias/dropzone/dropzone.js') }}"></script>
	

	<script>
		$(function() {

			$("#name").stringToSlug();
			
		});
	</script>
@endpush