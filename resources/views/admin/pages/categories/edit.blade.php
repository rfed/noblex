@extends('admin.layouts.app')
	
@section('admin.includes.breadcrumbs')
	{{ Breadcrumbs::render('categorias.edit', $parentCategory, @$categoria) }}
@endsection

@section('content')

<ul class="nav nav-tabs">
	<li><a href="#tab-general" data-toggle="tab">General</a></li>
	@if($categoria->root_id !== 1)
		<li><a href="#tab-menu" data-toggle="tab">Menu</a></li>
		<li><a href="#tab-home" data-toggle="tab">Home</a></li>
	@endif
</ul>
<!-- BEGIN FORM-->
{!! Form::model($categoria, ['route' => ['admin.categorias.update', $categoria->id], 'class' => 'form-horizontal form-row-seperated', 'method' => 'PUT']) !!}

	<!-- END FORM-->
	<div class="tab-content">
		
		<div class="tab-pane active" id="tab-general">
			
			<div class="portlet box yellow">

				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-plus"></i> Editar categoría
					</div>
				</div>

				<div class="portlet-body form">
					@include('admin.pages.categories.partials.form')
				</div>
			</div>

		</div>

		@if($categoria->root_id !== 1)
		<div class="tab-pane" id="tab-menu">
			<div class="portlet box yellow">

				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-plus"></i> Datos de Menú
					</div>
				</div>

				<div class="portlet-body form">
					@include('admin.pages.categories.partials.form_menu')
				</div>
			</div>
		</div>

		<div class="tab-pane" id="tab-menu">
			<div class="portlet box yellow">

				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-plus"></i> Datos de Home
					</div>
				</div>

				<div class="portlet-body form">
					Check mostrar en home?<br>
					Estilo: 1 imagen, 1 video, 3 videos.<br>

					Check mostrar productos destacados?<br>
					Listado productos destacados?<br>
				</div>
			</div>
		</div>
		@endif
		<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-3 col-md-9">
				@isset($categoria)
					{!! Form::button('<i class="fa fa-check"></i> Editar', ['type' => 'submit', 'class' => 'btn yellow', 'id' => 'submitFile']) !!}
				@else
					{!! Form::button('<i class="fa fa-check"></i> Agregar', ['type' => 'submit', 'class' => 'btn blue', 'id' => 'submitFile']) !!}
				@endisset

				<a href="{{ route('admin.categorias.index') }}" type="button" class="btn default">Volver</a>

			</div>
		</div>
    </div>
	</div>
{!! Form::close() !!}
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