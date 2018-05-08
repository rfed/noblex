@extends('front.layouts.app')

@section('content')

<div class="container">
    <h1 class="section_title">Mi cuenta</h1>

	<p>Editá tu perfil.</p>

    <form method="POST" action="{{ route('perfil.update', $customer->id) }}" class="form" id="formPerfil">
        @csrf
        {{ method_field('PUT') }}

        <label {{ $errors->first('firstname') ? 'class=error' : '' }}>
            <input type="text" name="firstname" placeholder="* Nombre" value="{{ $customer->firstname ?? old('firstname') }}" />
            {!! $errors->first('firstname') ? '<span class="msg_error">Este campo es obligatorio.</span>' : '' !!}
        </label>

        <label {{ $errors->first('lastname') ? 'class=error' : '' }}>
            <input type="text" name="lastname" placeholder="* Apellido" value="{{ $customer->lastname ?? old('lastname') }}" />
            {!! $errors->first('lastname') ? '<span class="msg_error">Este campo es obligatorio.</span>' : '' !!}
        </label>

        <div class="sexo {{ $errors->first('gender') ? 'error' : '' }}">
            <span>*Sexo</span>

            <label class="radio">
                <input type="radio" name="gender" value="female" {{ $customer->gender == 'female' ? 'checked' : '' }}/>
                <span>Mujer</span>
            </label>

            <label class="radio">
                <input type="radio" name="gender" value="male" {{ $customer->gender == 'male' ? 'checked' : '' }}/>
                <span>Hombre</span>
            </label>

            {!! $errors->first('gender', '<span class="msg_error"> :message </span>') !!}
        </div>

        @php
            $date = $customer->birth;
            $date_explode = explode('-', $date);
            $year = $date_explode[0];
            $month = $date_explode[1];
            $day = $date_explode[2];
        @endphp

        <div class="fecha {{ ($errors->first('day') || $errors->first('month') || $errors->first('year')) ? 'error' : '' }}">
            <span>* Fecha de nacimiento:</span>
            <div class="align_inputs">
                <input type="text" name="day" placeholder="Día" value="{{ $day ?? old('day') }}" />
                <input type="text" name="month" placeholder="Mes" value="{{ $month ?? old('month') }}" />
                <input type="text" name="year" placeholder="Año" value="{{ $year ?? old('year') }}" />
            </div>

            {!! $errors->first('day', '<span class="msg_error"> :message </span>') !!}
            {!! $errors->first('month', '<span class="msg_error"> :message </span>') !!}
            {!! $errors->first('year', '<span class="msg_error"> :message </span>') !!}
        </div><br>

        <label {{ $errors->first('email') ? 'class=error' : '' }}>
            <input type="email" name="email" placeholder="* Email" value="{{ $customer->email ?? old('email') }}" />
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
                    {{ ($customer->categories->pluck('id')->contains($category->id)) ? 'checked' : '' }} />
                    <span>{{ $category->name }}</span>
                </label>

            @endforeach

            {!! $errors->first('category_id') ? '<span class="msg_error">Debés seleccionar al menos una opción.</span>' : '' !!}
        </div>

        <div class="submit_block">
        	<input type="hidden" name="customer_id" value="{{ $customer->id }}">
            <input type="submit" value="Registrarme" id="submitPerfil" class="btn link" />

            {!! Session::has('success') ? '<p class="exito">'.Session::get('success').'</p>' : '' !!}
        </div>

    </form>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('pages/perfil/js/app.js') }}"></script>
@endpush