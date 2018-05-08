@extends('front.layouts.app')

@section('content')

<div class="container">

    {!! Session::has('success') ? '<p class="exito" style="text-align:center">'.Session::get('success').'</p><br>' : '' !!}
    
    <h1 class="section_title">Login</h1>

    <form action="login" method="POST" class="form">
        @csrf

        <label {{ $errors->first('email') ? 'class=error' : '' }}>
            <input type="email" name="email" placeholder="Email" />
            {!! $errors->first('email', '<span class="msg_error"> :message </span>') !!}
        </label>

        <label {{ $errors->first('password') ? 'class=error' : '' }}>
            <input type="password" name="password" placeholder="Contraseña" />
            {!! $errors->first('password', '<span class="msg_error"> :message </span>') !!}
        </label>

        <div class="submit_block">
            <a href="{{ route('password.request') }}" class="recup_pass">Recuperar contraseña</a>
            <input type="submit" value="Ingresar" class="btn link" />
        </div>

        <p class="register_link">Si no tenés cuenta registrate haciendo click <a href="{{ route('register') }}">aquí</a>.</p>

    </form>
</div>

@endsection
