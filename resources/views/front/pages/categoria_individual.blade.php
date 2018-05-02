@extends('front.layouts.app')

@section('includes.admin.breadcrumbs')
	{{ Breadcrumbs::render('home') }}
@endsection


@section('content')

<!-- CATEGORÍA -->
	<section>
		<div class="container">
			<div class="row">

				<div class="item product_box_link">
					<div class="image">
						<h1>
							<img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->name }}" />
						</h1>
					</div>

					<div class="info">
						<div class="half_block">
							<p class="strong sizefix"><strong>{{ $category->title }}</strong></p>
						</div>

						<div class="full_block no_padding">
							<div>
								<p>{{ $category->description }}</p>
							</div>
							<div>
								<div class="features">
									@foreach ($category->features as $feature)
									<img src="{{ asset('storage/'.$feature->image) }}" alt="{{ $feature->name }}" />
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		@if (count($category->products))
		<div class="product_list container">

			<div class="row">

				@foreach ($products as $product)
				<div class="col-xs-6 col-md-3">

					<div class="item">
						<a href="{{ url($category->url.'/'.$product->sku) }}">
							<div class="image">
								<img src="{{ asset('storage/'.($product->thumb ? $product->thumb->source : 'no-foto.png')) }}" alt="{{ $product->name }}"" />

								@if ($product->tag)
								<span class="feature"><span>{{ $product->tag }}</span></span>
								@endif
							</div>
							<span class="id">{{ $product->sku }}</span>
							<p class="title"><strong>{{ $product->name }}</strong></p>
							<span class="description">{{ $product->description }}</span>

							<button class="btn link">Ver producto</button>
						</a>
					</div>

				</div>
				@endforeach

			</div>

			@if ($products->lastPage() > 1)
			<div class="pagination">
				<div class="showing">
					<span>Mostrando {{ $products->perPage() }} de {{ $products->total() }} resultados</span>
				</div>

				<div class="pages">
					{{ $products->links('front.includes.pager') }}
				</div>
			</div>
			@endif

		</div>
		@endif

	</section>
	<!-- FIN CATEGORÍA -->

	@if ($category->banner)
	<section class="divider">
		<div class="container">

			@if ($category->banner_link)
			<a href="{{ $category->banner_link }}" target="{{ $category->banner_target }}">
				<img src="{{ asset('storage/'.$category->banner) }}" />
			</a>
			@else
				<img src="{{ asset('storage/'.$category->banner) }}" />
			@endif
		</div>
	</section>
	@endif

</main>

@endsection