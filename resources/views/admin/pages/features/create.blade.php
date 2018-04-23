@extends('admin.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/features/dropzone/dropzone.min.css') }}">
@endpush

@section('content')
	
	<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Agregar feature
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
				<form action="" method="POST" id="formCreate" class="form-horizontal form-row-seperated" enctype="multipart/form-data">
					
					@include('admin.pages.features.partials.form')

				</form> 

			
			</div>
		</div>
	</div>

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/pages/features/dropzone/dropzone.js') }}"></script>
	<script src="{{ asset('admin/assets/pages/features/dropzone/main.js') }}"></script>	
@endpush