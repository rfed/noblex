@extends('admin.layouts.app')

@section('content')
	
	<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Agregar atributo
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
				{!! Form::open(['route' => 'admin.attributes.store', 'class' => 'form-horizontal form-row-seperated']) !!}
					
					@include('admin.pages.attributes.partials.form')


				{!! Form::close() !!}
				</form> 

			
			</div>
		</div>
	</div>

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/pages/attributes/js/main.js') }}"></script>	
@endpush