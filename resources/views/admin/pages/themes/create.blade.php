@extends('admin.layouts.app')

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
				{!! Form::open(['route' => 'admin.themes.store', 'class' => 'form-horizontal form-row-seperated']) !!}

					@include('admin.pages.themes.partials.form')
					
				{!! Form::close() !!}
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection