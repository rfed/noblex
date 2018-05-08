@component('mail::message')
# Nuevo Mensaje

<br>
<p>Nombre: {{ $contact->firstname.' '.$contact->lastname }}</p>
<p>E-mail: {{ $contact->email }}</p>
<p>Mensaje: </p>
<p>{!! nl2br(e($contact->message)) !!}</p>

<!-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent -->

<br>Atte,<br>
{{ config('app.name') }}
@endcomponent
