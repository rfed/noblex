	<div class="form-body">

		<div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
		@foreach ($features as $feature)
			<label class="col-md-3">
				<input type="checkbox" name="features[]" value="{{ $feature->id }}" {{ in_array($feature->id, $categoryFeatures) ? 'checked' : '' }} /> {{ $feature->name }}
			</label>
		@endforeach
		</div>

	</div>