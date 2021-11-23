
	<div class="form-body">

		<div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
			{!! Form::label('title', 'Titulo', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Titulo', 'autocomplete' => 'off']) !!}
				{!! $errors->first('title', '<span class="help-block"> :message </span>') !!}
			</div>
		</div>
		
		<div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
			{!! Form::label('email', 'Email', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::select('email[]', 
					isset($subject) ? $subject->email_subjects->pluck('subject_id', 'email') : [], 
					isset($subject) ? $subject->id : null , 
				['class' => 'form-control', 'id' => 'email', 'data-role' => 'tagsinput', 'multiple' => true]) !!}
            	{!! $errors->first('email', '<span class="help-block"> :message </span>') !!}
            </div>
		</div>

	</div>

	<div class="form-actions">
		<div class="row">
			<div class="col-md-offset-3 col-md-9">
				@isset($subject)
					{!! Form::button('<i class="fa fa-check"></i> Editar', ['type' => 'submit', 'class' => 'btn yellow', 'id' => 'submitFile']) !!}
				@else
					{!! Form::button('<i class="fa fa-check"></i> Agregar', ['type' => 'submit', 'class' => 'btn blue', 'id' => 'submitFile']) !!}
				@endisset

				<a href="{{ route('admin.subjects.index') }}" type="button" class="btn default">Volver</a>

			</div>
		</div>
	</div>