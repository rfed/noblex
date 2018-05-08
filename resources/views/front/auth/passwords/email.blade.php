@extends('front.layouts.app')

@section('content')

<div class="container">
    <h1 class="section_title">Recuperar clave</h1>
    <p>Ingresá tu email para recuperar tu clave.</p>

    <form action="{{ route('password.email') }}" method="POST" class="form" id="formPasswordReset">
        @csrf

        <label {{ $errors->first('email') ? 'class=error' : '' }}>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
            {!! $errors->first('email', '<span class="msg_error"> :message </span>') !!}
        </label>

        <div class="submit_block">
            {!! Session('status') ? '<p class="exito">Te enviamos un mail, revisá tu bandeja de entrada o SPAM.</p>' : '' !!}

            <input type="submit" value="Enviar" id="submitPasswordReset" class="btn link" />
        </div>

    </form>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('pages/password_reset/js/app.js') }}"></script>
@endpush
