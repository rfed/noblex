@extends('front.layouts.app')

@section('content')

<div class="container">
	<h1 class="section_title">Contacto</h1>

	<div class="content row">
		<div class="col-xs-12 col-sm-6">
			<div class="phone">

				<div>
					<i class="fa fa-phone-volume"></i>
					<a href="tel:08104446976">
						<p>0.810<br /> 444.6976</p>
						<span>NWSN</span>
					</a>
				</div>

			</div>
		</div>

		<div class="col-xs-12 col-sm-6">
			<form method="POST" action="{{ route('contacto.store') }}" class="form" id="formContacto">
				@csrf

				<p class="title">Escribinos un mensaje:</p>

				{!! Session::has('success') ? '<p class="exito">'.Session::get('success').'</p>' : '' !!}

				<label {{ $errors->first('firstname') ? 'class=error' : '' }}>
					<input type="text" placeholder="* Nombre" name="firstname" value="{{ old('firstname') }}" />
					{!! $errors->first('firstname') ? '<span class="msg_error">Debés completar este campo</span>' : '' !!} 
				</label>

				<label>
					<input type="text" placeholder="Apellido" name="lastname" value="{{ old('lastname') }}" />
				</label>

				<label {{ $errors->first('email') ? 'class=error' : '' }}>
					<input type="email" placeholder="* Email" name="email" value="{{ old('email') }}"/>
					{!! $errors->first('email', '<span class="msg_error"> :message </span>') !!}
				</label>

				<label {{ $errors->first('subject') ? 'class=error' : '' }}>
					<select name="subject_id">
						<option disabled selected>* Asunto</option>
						
						@foreach($subjects as $subject)
							<option value="{{ $subject->id }}" {{ collect(old('subject_id'))->contains($subject->id) ? 'selected' : '' }}>
								{{ $subject->title }}</option>
						@endforeach

					</select>
					{!! $errors->first('subject') ? '<span class="msg_error">Debés completar este campo</span>' : '' !!} 
				</label>

				<label {{ $errors->first('message') ? 'class=error' : '' }}>
					<textarea name="message" placeholder="* Mensaje" rows="5">{{ old('message') }}</textarea>
					{!! $errors->first('message') ? '<span class="msg_error">Debés completar este campo</span>' : '' !!} 
				</label>

				<div class="submit_block">

					<!-- https://github.com/anhskohbo/no-captcha -->
					{!! NoCaptcha::display() !!}

					<input type="submit" value="Enviar" id="submit" class="btn link" />

				</div>

				{!! $errors->first('g-recaptcha-response') ? '<span class="msg_error">El Captcha es requerido</span>' : '' !!}

			</form>
		</div>
	</div>
</div>

@push('scripts')
	<script src="{{ asset('pages/contacto/js/app.js') }}"></script>
@endpush


@endsection