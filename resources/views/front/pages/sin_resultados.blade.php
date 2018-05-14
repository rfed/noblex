@extends('front.layouts.app')

@section('content')

<div class="content container">

	<div class="search_field">
		<h1>No se encontraron resultados para tu búsqueda: {{ $request->buscar }}</h1>

		<p>Por favor, revisá si escribiste correctamente, o intentá nuevamente con otros términos:</p>

		<form action="{{ route('busqueda.index') }}" method="GET">

			<div class="input_group search">

				<input type="text" name="buscar" placeholder="ej: Smart" autocomplete="off" />

				<button type="submit">
					<span class="fa fa-search"></span>
					<span class="sr-only">Buscar</span>
				</button>
			</div>

			<input class="btn link" type="submit" value="Buscar" />
		</form>
	</div>
	
	<div class="row">
		<div class="related_links">
			<p><strong>Tal vez te pueda interesar:</strong></p>
			
			<!-- Variable pasada desde app/Providers/ViewComposerProvider -->
			@foreach($randomCategories as $randomCategory) 

				<div class="item col-xs-12 col-sm-4">
					<a href="{{ url($randomCategory->url) }}">
						<img src="{{ url("storage/$randomCategory->image") }}" alt="{{ $randomCategory->name }}" />
					</a>
				</div>

			@endforeach
		</div>
	</div>

</div>

@endsection