@extends('front.layouts.app')

@section('content')

<div class="product_list container">

	<div class="section_head">
		<h1>Resultados de búsqueda: {{ $request->buscar }}</h1>
		<p><strong>Se encontraron {{ $productos->count() }} resultados</strong></p>
	</div>


	<div class="row">

		<!-- -->

		@foreach($productos as $producto)

		<div class="col-xs-6 col-md-3">

			<div class="item">
				<a href="#">
					<div class="image">
						<img src="{{ asset("storage/".$producto->thumb['source']) }}" alt='{{ $producto->name }}' />
					</div>
					<span class="id">{{ $producto->sku }}</span>
					<p class="title"><strong>{{ $producto->name }}</strong></p>
					<span class="description">{{ str_limit($producto->description, 100) }}<span/>

					<a href='{{ $producto->category->url}}/{{$producto->sku}}' class="btn link">Ver producto</a>
				</a>
			</div>

		</div>

		@endforeach

	</div>


	<!-- PAGINADOR -->

	<div class="pagination">
		<div class="showing">
			<span>Mostrando 30 de 157 resultados</span>
		</div>
		
		<div class="pages">
			<a href="#" class="prev">
				<span>Anterior</span>
				<span class="fa fa-angle-left"></span>
			</a>
			<a href="#">1</a>
			<a href="#">2</a>
			<a href="#" class="current">3</a>
			<a href="#">4</a>
			<a href="#">5</a>
			<a href="#" class="next">
				<span>Siguiente</span>
				<span class="fa fa-angle-right"></span>
			</a>
		</div>
	</div>

	<!-- FIN PAGINADOR -->


</div>

@endsection