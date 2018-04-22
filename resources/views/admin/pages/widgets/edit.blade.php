@extends('admin.layouts.app')

@section('content')
	
	<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Actualizar Widget
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
				{!! Form::model($widget, ['route' => ['admin.widgets.update', $widget->id], 'class' => 'form-horizontal form-row-seperated widget-form', 'method' => 'PUT']) !!}

					@include('admin.pages.widgets.partials.form')
					
				{!! Form::close() !!}
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection

@push('scripts')

@endpush