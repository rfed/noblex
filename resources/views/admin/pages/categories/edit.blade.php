@extends('admin.layouts.app')
	
@section('breadcrumbs')
	{{ Breadcrumbs::render('categorias.edit', $parentCategory, @$categoria) }}
@endsection

@section('content')
	
	<div class="tab-pane">
		<div class="portlet box yellow">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Editar categoría
				</div>
			</div>

			<div class="portlet-body form">
			
				<!-- BEGIN FORM-->
				{!! Form::model($categoria, ['route' => ['admin.categorias.update', $categoria->id], 'class' => 'form-horizontal form-row-seperated', 'method' => 'PUT']) !!}

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
	

	<script>
		$(function() {
			$("#name").stringToSlug();
		});
	</script>
@endpush