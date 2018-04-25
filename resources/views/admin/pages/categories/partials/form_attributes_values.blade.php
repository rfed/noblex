	<div class="form-body">

		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					Sin agrupar
				</div>
			</div>
			<div class="portlet-body form">
				<div class="form-body">
					<div class="form-group">
					    <label class="col-md-3 control-label">Alto:</label>
					    <div class="col-md-9">
					        <input type="text" class="form-control" />
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-md-3 control-label">Ancho:</label>
					    <div class="col-md-9">
					        <input type="text" class="form-control" />
					    </div>
					</div>
				</div>
			</div>
		</div>

		<div class="portlet box yellow">
			<div class="portlet-title">
				<div class="caption">
					Dimensiones
				</div>
			</div>
			<div class="portlet-body form">
				<div class="form-body">
					<div class="form-group">
					    <label class="col-md-3 control-label">Alto:</label>
					    <div class="col-md-9">
					        <input type="text" class="form-control" />
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-md-3 control-label">Ancho:</label>
					    <div class="col-md-9">
					        <input type="text" class="form-control" />
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>

@push('scripts')
<script>
	$(function() {
		$('.chkAll').click(function(){
			$('.chk' + $(this).data('ref')).trigger('click');
		});
	});
</script>
@endpush