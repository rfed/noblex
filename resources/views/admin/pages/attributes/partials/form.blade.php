
	<div class="form-body">

		<div class="form-group name {{ $errors->first('name') ? 'has-error' : '' }}">
			{!! Form::label('name', 'Nombre', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nombre', 'autocomplete' => 'off']) !!}
				<span class="help-block msg"></span>
			</div>		
		</div>

		<div class="form-group {{ $errors->first('attributegroup_id') ? 'has-error' : '' }}">
			{!! Form::label('attributegroup_id', 'Agrupar bajo', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				<select name="attributegroup_id" class="selectpicker" title="Seleccione el grupo deseado" data-show-subtext="true" data-live-search="true" data-width="50%">

					@foreach($groups as $group)
						<option value="{{ $group->id }}" 
							@if( (old("attributegroup_id") && old("attributegroup_id") == $group->id) || (isset($attribute) && $group->id == $attribute->attributegroup_id)) ) 
								selected
							@endif
						>{{ $group->name }}</option>
					@endforeach

				</select>
				{!! $errors->first('attributegroup_id', '<span class="help-block"> :message </span>') !!}
			</div>
		</div>	
	</div>

	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-3 col-md-9">
				@isset($attribute)
					{!! Form::button('<i class="fa fa-check"></i> Editar', ['type' => 'submit', 'class' => 'btn yellow', 'id' => 'submitFile']) !!}
				@else
					{!! Form::button('<i class="fa fa-check"></i> Agregar', ['type' => 'submit', 'class' => 'btn blue', 'id' => 'submitFile']) !!}
				@endisset

				<a href="{{ route('admin.attributes.index') }}" type="button" class="btn default">Volver</a>

			</div>
		</div>
	</div>