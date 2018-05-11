@extends('admin.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/subjects/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endpush

@section('content')
	
	<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Agregar asunto
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
				{!! Form::open(['route' => 'admin.subjects.store', 'class' => 'form-horizontal form-row-seperated']) !!}
					
					@include('admin.pages.subjects.partials.form')

				{!! Form::close() !!}

			</div>
		</div>
	</div>

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/pages/subjects/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
	<script>
		$(function(){
			$('.bootstrap-tagsinput').addClass('input-xlarge');
		});
	</script>
@endpush