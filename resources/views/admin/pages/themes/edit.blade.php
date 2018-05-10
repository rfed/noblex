@extends('admin.layouts.app')

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
				{!! Form::model($theme, ['route' => ['admin.themes.update', $theme->id], 'class' => 'form-horizontal form-row-seperated', 'method' => 'PUT']) !!}

					@include('admin.pages.themes.partials.form')

					
				{!! Form::close() !!}
				<!-- END FORM-->
				
			</div>
		</div>
	</div>

@endsection