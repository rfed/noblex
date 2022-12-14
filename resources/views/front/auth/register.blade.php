@extends('front.layouts.app')

@section('content')

<div class="container">
    <h1 class="section_title">Registrate</h1>

    <p>Seleccioná tus intereses para ver contenido a tu medida.</p>

    <form method="POST" action="{{ route('register') }}" class="form" id="formRegistro">
        @csrf

        {!! Session::has('success') ? '<p class="exito">'.Session::get('success').'</p>' : '' !!}

        <label {{ $errors->first('firstname') ? 'class=error' : '' }}>
            <input type="text" name="firstname" placeholder="* Nombre" value="{{ old('firstname') }}" />
            {!! $errors->first('firstname') ? '<span class="msg_error">Este campo es obligatorio.</span>' : '' !!}
        </label>

        <label {{ $errors->first('lastname') ? 'class=error' : '' }}>
            <input type="text" name="lastname" placeholder="* Apellido" value="{{ old('lastname') }}" />
            {!! $errors->first('lastname') ? '<span class="msg_error">Este campo es obligatorio.</span>' : '' !!}
        </label>

        <div class="sexo {{ $errors->first('gender') ? 'error' : '' }}">
            <span>*Sexo</span>

            <label class="radio">
                <input type="radio" name="gender" value="F" {{ old('gender') == 'F' ? 'checked' : '' }}/>
                <span>Mujer</span>
            </label>

            <label class="radio">
                <input type="radio" name="gender" value="M" {{ old('gender') == 'M' ? 'checked' : '' }}/>
                <span>Hombre</span>
            </label>

            {!! $errors->first('gender', '<span class="msg_error"> :message </span>') !!}
        </div>

        <div class="fecha {{ ($errors->first('day') || $errors->first('month') || $errors->first('year')) ? 'error' : '' }}">
            <span>* Fecha de nacimiento:</span>
            <div class="align_inputs">
                <input type="text" name="day" placeholder="Día" value="{{ old('day') }}" />
                <input type="text" name="month" placeholder="Mes" value="{{ old('month') }}" />
                <input type="text" name="year" placeholder="Año" value="{{ old('year') }}" />
            </div>

            {!! $errors->first('day', '<span class="msg_error"> :message </span>') !!}
            {!! $errors->first('month', '<span class="msg_error"> :message </span>') !!}
            {!! $errors->first('year', '<span class="msg_error"> :message </span>') !!}
        </div><br>

        <label {{ $errors->first('email') ? 'class=error' : '' }}>
            <input type="email" name="email" placeholder="* Email" value="{{ old('email') }}" />
            {!! $errors->first('email', '<span class="msg_error"> :message </span>') !!}
        </label>

        <label {{ $errors->first('password') ? 'class=error' : '' }}>
            <input type="password" name="password" placeholder="* Contraseña" />
            {!! $errors->first('password', '<span class="msg_error"> :message </span>') !!}
        </label>

        <label {{ $errors->first('password_confirmation') ? 'class=error' : '' }}>
            <input type="password" name="password_confirmation" placeholder="* Repetir Contraseña" />
            {!! $errors->first('password_confirmation', '<span class="msg_error"> :message </span>') !!}
        </label>

        <div class="title">
            <p><strong>Productos de interés:</strong></p>
            <span>Seleccioná una o varias categorías</span>
        </div>

        <div class="checkbox_list {{ $errors->first('category_id') ? 'error' : '' }}">
            
            @foreach($categories as $category)

                <label class="checkbox">
                    <input type="checkbox" value="{{ $category->id }}" name="category_id[]" 
                    {{ (is_array(old('category_id')) && in_array($category->id, old('category_id'))) ? 'checked' : '' }} />
                    <span>{{ $category->name }}</span>
                </label>

            @endforeach

            {!! $errors->first('category_id') ? '<span class="msg_error">Debés seleccionar al menos una opción.</span>' : '' !!}
        </div>

        <div class="submit_block">
            
            <!-- https://github.com/anhskohbo/no-captcha -->
            {!! NoCaptcha::display() !!}

            <input type="submit" value="Registrarme" id="submitRegistro" class="btn link" />
        </div>

        {!! $errors->first('g-recaptcha-response') ? '<span class="msg_error">El Captcha es requerido</span>' : '' !!}

    </form>
</div>

@push('scripts')
    <script src="{{ asset('pages/registro/js/app.js') }}"></script>
@endpush

@endsection
