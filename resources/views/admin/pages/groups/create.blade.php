@extends('admin.layouts.app')

@section('content')
	
	<div class="tab-pane">
		<div class="portlet box blue">

			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-plus"></i> Agregar grupo
				</div>
			</div>

			<div class="portlet-body form">

				<!-- BEGIN FORM-->
				<form action="" method="POST" id="formCreate" class="form-horizontal form-row-seperated" enctype="multipart/form-data">
					
					@include('admin.pages.attributeGroups.partials.form')

				</form> 

			
			</div>
		</div>
	</div>

@endsection

@push('scripts')
	<script src="{{ asset('admin/assets/pages/attributeGroups/js/main.js') }}"></script>	
@endpush