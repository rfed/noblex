@extends('admin.auth.layouts.app')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="login-form" id="formEmail" method="POST" action="{{ route('password.email') }}">
        @csrf
    
        <h3 class="form-title font-green">Olvidaste la contraseña?</h3>

        @if($errors->all())
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>

                @foreach($errors->all() as $error)
                    <span id="errorEmail">{{ $error }}</span>
                @endforeach
                
            </div>
        @endif

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input id="email" type="email" placeholder="E-mail" class="form-control" name="email" value="{{ old('email') }}" autofocus autocomplete="off" /> 
        </div>
        
        <hr>

        <a href="{{ url('/') }}" id="back-btn" class="btn green btn-outline">Volver</a>
        <button type="submit" id="submit-email" class="btn btn-success uppercase pull-right">Enviar</button>

    </form>

@endsection
