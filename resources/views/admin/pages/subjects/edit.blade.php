@extends('admin.layouts.app')

@push('styles')
	<link rel="stylesheet" href="{{ asset('admin/assets/pages/subjects/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endpush

@section('content')
	
	<div class="tab-pane">
		<div class="portlet box yellow">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Editar asunto
				</div>
			</div>

			<div class="portlet-body form">
			
				<!-- BEGIN FORM-->
				{!! Form::model($subject, ['route' => ['admin.subjects.update', $subject->id], 'class' => 'form-horizontal form-row-seperated', 'method' => 'PUT']) !!}

					@include('admin.pages.subjects.partials.form')

				{!! Form::close() !!}
				<!-- END FORM-->
				
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