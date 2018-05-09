@extends('front.layouts.app')

@push('styles')
	<link href="{{ asset('assets/datatables/datatables.min.css') }}" rel="stylesheet" />
@endpush

@section('includes.admin.breadcrumbs')
	{{ Breadcrumbs::render('home') }}
@endsection

@section('content')

<div class="container">

	<img src="assets/imgs/imagenes/download_banner.png" alt="Centro de descarga" />

	<table id="manuales">
		<thead>
			<tr>
				<th class="modelo">Modelo</th>
				<th class="tipo">Tipo de producto</th>
				<th class="descripcion">Descripción</th>
				<th>Fecha de subida</th>
				<th class="peso">Peso</th>
				<th class="download_btn">Descargar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($productos as $producto)
				<tr>
					<td>{{ $producto->sku }}</td>
					<td>{{ $producto->category->name }}</td>
					<td>{{ $producto->short_description }}</td>
					<td>{{ $producto->created_at->format('d/m/Y') }}</td>
					@php 
						$sizeKb = Storage::disk('public')->size($producto->manual);
						$megabytes = number_format($sizeKb / 1048576, 2);	
					@endphp
					<td>{{ $megabytes . ' MB' }}</td>
					<td class="download_btn">
						<a href="{{ url("storage/$producto->manual") }}" class="fa fa-download" download="Manual_{{ $producto->sku }}"></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<p class="note">Todos los productos Noblex con sistema operativo Windows, cumplen con los requisitos de actualización a Windows 10 versión 1703. Encontrá toda la información necesaria para actualizar tu equipo en: <a href="https://support.microsoft.com/windows" target="_blank">https://support.microsoft.com/windows</a></p>

</div>

@push('scripts')
	<script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('pages/descargas/js/main.js') }}"></script>
@endpush

@endsection