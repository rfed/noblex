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
		<div class="padding_top product_list_carousel owl-carousel">

			<!-- -->
			@foreach ($category->products as $product)
			<div class="item">
				<a href="{{ url($parentCategory->url.'/'.$category->url.'/'.$product->sku) }}">
					<div class="image">
						<img src="{{ asset('storage/'.$product->thumb) }}" alt="{{ $product->name }}"" />

						<!--<span class="feature"><span>65"</span></span>-->
					</div>
					<span class="id">{{ $product->sku }}</span>
					<p class="title"><strong>{{ $product->name }}</strong></p>
					<span class="description">{{ $product->description }}</span>
				</a>

				<label class="checkbox">
					<input type="checkbox" value="comparar" />
					<span>Comparar</span>
				</label>
				
				<a href="#" class="btn link" data-sku="{{ $product->sku }}">Comprar</a>
			</div>
			@endforeach
			<!-- -->

		</div>
		@endif

	</section>
	<!-- FIN CATEGORÍA -->


	<section class="divider">
		<div class="container">

			<a href="#">
				<img src="/assets/imgs/imagenes/banner_4.png" alt="Vamos Argentina - NOBLEX proveedor Oficial de la Selección Argentina" />
			</a>

		</div>
	</section>

</main>

@endsection