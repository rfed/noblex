@extends('admin.auth.layouts.app')

@section('content')

    <form class="login-form" method="POST" action="{{ route('admin.password.request') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <h3 class="form-title font-green">Cambiar contraseña</h3>

        @if($errors->all())
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>

                <ul>
                @foreach($errors->all() as $error)
                    <li><span>{{ $error }}</span></li>
                @endforeach
                </ul>
                
            </div>
        @endif

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input id="email" type="email" placeholder="E-mail" class="form-control" name="email" value="{{ $email ?? old('email') }}" autofocus autocomplete="off" /> 
        </div>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
            <input id="password" type="password" placeholder="Contraseña" class="form-control" name="password" autocomplete="off" /> 
        </div>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Confirmar contraseña</label>
            <input id="password-confirm" type="password" placeholder="Confirmar contraseña" class="form-control" name="password_confirmation" autocomplete="off" /> 
        </div>

        <hr>

        <button type="submit" class="btn btn-success uppercase pull-right">Enviar</button>

    </form>
    
@endsection
