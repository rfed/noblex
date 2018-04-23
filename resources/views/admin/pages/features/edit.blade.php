@extends('admin.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/features/dropzone/dropzone.min.css') }}">
@endpush

@section('content')
	
	<div class="tab-pane">
		<div class="portlet box yellow">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Editar feature
				</div>
			</div>

			<div class="portlet-body form">
			
				<!-- BEGIN FORM-->
				{!! Form::model($feature, ['route' => ['admin.features.update', $feature->id], 'class' => 'form-horizontal form-row-seperated', 'method' => 'PUT']) !!}

					@include('admin.pages.features.partials.form')

					
				{!! Form::close() !!}
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/pages/features/dropzone/dropzone.js') }}"></script>
@endpush