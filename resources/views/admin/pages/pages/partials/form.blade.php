	<div class="form-body">

		<div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
			{!! Form::label('title', 'Titulo', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Titulo', 'autocomplete' => 'off']) !!}
				{!! $errors->first('title', '<span class="help-block"> :message </span>') !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('url', 'URL', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::text('url', null, ['class' => 'form-control', 'id' => 'permalink', 'placeholder' => 'URL']) !!} 
				{!! $errors->first('url', '<span class="help-block"> :message </span>') !!}
			</div>
		</div>

		<div class="form-group {{ $errors->first('category_id') ? 'has-error' : '' }}" id="category">
			{!! Form::label('template', 'Alineación', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				<select name="template_id" id="template_id" class="form-control">
					<option value="">Seleccione un tipo de alineación</option>
					
					@foreach($templates as $template)
						<option value="{{ $template->id }}" @if(@$page->template_id == $template->id) selected @endif>{{ $template->name }}</option>
					@endforeach

				</select>
				{!! $errors->first('template_id', '<span class="help-block"> :message </span>') !!}
			</div>
		</div>

		<div class="form-group content {{ $errors->first('content') ? 'has-error' : '' }}">
			{!! Form::label('content', 'Contenido', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content', 'rows' => 3]) !!}
				{!! $errors->first('content', '<span class="help-block"> :message </span>') !!}
				<span class="help-block msg"></span>
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('visible', 'Activo', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::checkbox('visible', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'visible']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('footer', 'Accesible en Footer', ['class' => 'control-label col-md-3']) !!}
			<div class="col-md-9">
				{!! Form::checkbox('footer', null, null, ['class' => 'make-switch', 'data-size' => 'small', 'id' => 'footer']) !!}
			</div>
		</div>

	</div>