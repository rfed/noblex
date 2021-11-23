@extends('front.layouts.app')

@section('content')

<div class="product_list container">

	<div class="section_head">
		<h1>Resultados de búsqueda: {{ $request->buscar }}</h1>
		<p><strong>{{ $productos->count()>1 ? ('Se encontraron '.$productos->count().' resultados') : ('Se encontró 1 resultado') }}</strong></p>
	</div>


	<div class="row">

		<!-- -->

		@foreach($productos as $producto)

		<div class="col-xs-6 col-md-3">

			<div class="item">
				<a href="{{ $producto->category->url}}/{{$producto->sku}}">
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
			<span>Mostrando {{ $productos->count() }} de {{ $productos->total() }} resultado/s</span>
		</div>
		
		<div class="pages">
			@if ($productos->onFirstPage())
		        <li class="disabled"><span>&laquo;</span></li>
		    @else
			<a href="{{ request()->url().'?buscar='.$request->buscar.'&page='.($productos->currentPage() - 1) }}" class="prev">
				<span>Anterior</span>
				<span class="fa fa-angle-left"></span>
			</a>
			@endif
			
			@for($i=1; $i <= $productos->lastPage(); $i++)
				@if($productos->currentPage() != $i)
					<a href="{{ request()->url().'?buscar='.$request->buscar.'&page='.$i }}">{{ $i }}</a>
				@else
					<a class="current">{{ $i }}</a>
				@endif
			@endfor
			
			@if ($productos->hasMorePages())
		        <a href="{{ request()->url().'?buscar='.$request->buscar.'&page='.($productos->currentPage() + 1) }}" class="next">
					<span>Siguiente</span>
					<span class="fa fa-angle-right"></span>
				</a>
		    @else
				<li class="disabled"><span>&raquo;</span></li>
			@endif

		</div>
	</div>

	<!-- FIN PAGINADOR -->


</div>

@endsection