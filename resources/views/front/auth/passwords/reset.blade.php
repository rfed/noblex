@extends('front.layouts.app')

@section('content')

<div class="container">
    <h1 class="section_title">Reseteo de contraseña</h1>
    <p>Ingresá tu nueva clave.</p>

    <form action="{{ route('password.request') }}" method="POST" class="form" id="formPasswordReset">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <label {{ $errors->first('email') ? 'class=error' : '' }}>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
            {!! $errors->first('email', '<span class="msg_error"> :message </span>') !!}
        </label>

        <label {{ $errors->first('password') ? 'class=error' : '' }}>
            <input type="password" name="password" placeholder="Contraseña" />
            {!! $errors->first('password', '<span class="msg_error"> :message </span>') !!}
        </label>

        <label {{ $errors->first('password_confirmation') ? 'class=error' : '' }}>
            <input id="password-confirm" type="password" placeholder="Confirmar contraseña" class="form-control" name="password_confirmation" autocomplete="off" />
        </label>

        <div class="submit_block">
            <input type="submit" value="Enviar" id="submitPasswordReset" class="btn link" />
        </div>

    </form>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('pages/password_reset/js/app.js') }}"></script>
@endpush
