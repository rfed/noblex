	<div class="form-body">

		<div class="portlet box yellow" style="width:25%; float:left;">
			<div class="portlet-title">
				<div class="caption">
					<label class="mt-checkbox" style="margin:0 0 5px; font-size:18px"><input type="checkbox" class="chkAll" data-ref="00"> Sin agrupar
						<span></span>
					</label>
				</div>
			</div>
			<div class="portlet-body form">
				<div class="scroller" style="height:200px" data-always-visible="1" data-rail-visible="1" data-rail-color="grey" data-handle-color="black">
					<div class="mt-checkbox-list" style="padding:10px;">
					    <label class="mt-checkbox">
					        <input type="checkbox" class="chk00"> Alto
					        <span></span>
					    </label>
					</div>
				</div>
			</div>
		</div>

		@for ($i=0; $i<10; $i++)
		<div class="portlet box yellow" style="width:25%; float:left;">
			<div class="portlet-title">
				<div class="caption">
					<label class="mt-checkbox" style="margin:0 0 5px; font-size:18px"><input type="checkbox" class="chkAll" data-ref="{{$i}}"> Dimensiones
						<span></span>
					</label>
				</div>
			</div>
			<div class="portlet-body form">
				<div class="scroller" style="height:200px" data-always-visible="1" data-rail-visible="1" data-rail-color="grey" data-handle-color="black">
					<div class="mt-checkbox-list" style="padding:10px;">
					    <label class="mt-checkbox">
					        <input type="checkbox" class="chk{{$i}}"> Alto
					        <span></span>
					    </label>
					    <label class="mt-checkbox">
					        <input type="checkbox" class="chk{{$i}}"> Ancho
					        <span></span>
					    </label>
					    <label class="mt-checkbox">
					        <input type="checkbox" class="chk{{$i}}"> Profundidad
					        <span></span>
					    </label>
					    <label class="mt-checkbox">
					        <input type="checkbox" class="chk{{$i}}"> Alto
					        <span></span>
					    </label>
					    <label class="mt-checkbox">
					        <input type="checkbox" class="chk{{$i}}"> Ancho
					        <span></span>
					    </label>
					    <label class="mt-checkbox">
					        <input type="checkbox" class="chk{{$i}}"> Profundidad
					        <span></span>
					    </label>
					</div>
				</div>
			</div>
		</div>
		@endfor
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