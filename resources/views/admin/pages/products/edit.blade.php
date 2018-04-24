@extends('admin.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/features/dropzone/dropzone.min.css') }}">
@endpush

@section('content')

<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	<li><a href="#tab-imagenes" data-toggle="tab">Imagenes</a></li>
	<li><a href="#tab-bloques" data-toggle="tab">Bloques</a></li>
</ul>

{!! Form::model($producto, ['route' => ['admin.productos.update', $producto->id], 'class' => 'form-horizontal form-row-seperated', 'method' => 'PUT']) !!}

<div class="tab-content">
	
	<div class="tab-pane active" id="tab-general">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Propiedades
				</div>
			</div>

			<div class="portlet-body form">
				<div class="form-body">
					@include('admin.pages.products.partials.form')
				</div>				
			</div>
		</div>
	</div>

	<div class="tab-pane" id="tab-imagenes">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Imagenes
				</div>
			</div>
			
			<div class="portlet-body form">
				<div class="form-body">						
					@include('admin.pages.products.partials.media')
				</div>
			</div>
		</div>
	</div>

	<div class="tab-pane" id="tab-bloques">
		@include('admin.pages.products.partials.blocks')
	</div>
</div>

{!! Form::hidden('id', $producto->id) !!}
{!! Form::close() !!}

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/pages/productos/js/app.js') }}"></script>

	<script>
		@if(!empty($subcategoria) && !empty($categoria));
			$(document).ready(function(){
				subcategorias({{ $categoria->id }}, {{ $subcategoria->id}})
			});
		@endif
	</script>
@endpush