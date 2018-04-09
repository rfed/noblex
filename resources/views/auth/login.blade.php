@extends('auth.layouts.app')

@section('content')

    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" method="post">
        @csrf

        <h3 class="form-title font-green">Ingreso</h3>
        
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
            <input id="email" type="email" placeholder="E-mail" class="form-control" name="email" value="{{ old('email') }}" autofocus autocomplete="off" /> 
        </div>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Contraseña</label>
            <input id="password" type="password" placeholder="Contraseña" class="form-control" name="password" autocomplete="off" /> 
        </div>

        <hr>

        <!-- <div class="form-actions"> -->
            <button type="submit" class="btn green uppercase">Login</button>
            
            <label class="rememberme check mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Recordarme
                <span></span>
            </label>
            
            <a href="{{ route('password.request') }}" class="forget-password pull-left" id="forget-password">
                Olvidaste la contraseña?
            </a>
            
            <!-- <div class="clearfix"></div> -->

        <!-- </div> -->

        <!-- <div class="create-account">
            <p>
                <a href="javascript:;" id="register-btn" class="uppercase">Crear cuenta</a>
            </p>
        </div> -->
    </form>

@endsection