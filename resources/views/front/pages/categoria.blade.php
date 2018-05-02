@extends('front.layouts.app')

@section('includes.admin.breadcrumbs')
	{{ Breadcrumbs::render('home') }}
@endsection

@section('hotlinks')
	<div class="tags">
		@foreach ($category->childs as $cat)
        <a href="#{{ $cat->url }}" data-section="{{ $cat->url }}">{{ $cat->name }}</a>
        @endforeach
    </div>
@endsection

@section('content')

<!-- CATEGORÍA -->
	<div class="container">
		<h1 class="section_title">{{ $category->title }}</h1>
	</div>

	@foreach ($category->childs as $cat)
	@if ($cat->image && $cat->title)
	<section class="{{ $loop->index > 0 ? 'divider' : '' }}" data-id="{{ $cat->url }}">
		<div class="container">
			<div class="row">

				<div class="item product_box_link">
					<div class="image">
						<a href="{{ url($category->url.'/'.$cat->url) }}">
							<img src="{{ asset('storage/'.$cat->image) }}" alt="{{ $cat->title }}" />
						</a>
					</div>

					<div class="info">
						<div class="half_block">
							<p class="strong sizefix"><strong>{{ $cat->title }}</strong></p>
						</div>

						<div class="full_block no_padding">
							<div>
								<p>{{ $cat->description }}</p>
							</div>
							<div>
								<div class="features">
									@foreach ($cat->features as $feature)
									<img src="{{ asset('storage/'.$feature->image) }}" alt="{{ $feature->name }}" />
									@endforeach
								</div>
							</div>
						</div>

						<div class="link_block">
							<a href="{{ url($cat->url) }}" class="btn link">Ver todos</a>
						</div>
					</div>
				</div>

			</div>
		</div>

		@if (count($cat->products))
		<div class="padding_top product_list_carousel owl-carousel">

			<!-- -->
			@foreach ($cat->products as $product)
			<div class="item">
				<a href="{{ url($cat->url.'/'.$product->sku) }}">
					<div class="image">
						<img src="{{ asset('storage/'.($product->thumb ? $product->thumb->source : 'no-foto.png')) }}" alt="{{ $product->name }}"" />

						@if ($product->tag)
						<span class="feature"><span>{{ $product->tag }}</span></span>
						@endif
					</div>
					<span class="id">{{ $product->sku }}</span>
					<p class="title"><strong>{{ $product->name }}</strong></p>
					<span class="description">{{ $product->description }}</span>
				</a>

				<label class="checkbox">
					<input type="checkbox" value="comparar" />
					<span>Comparar</span>
				</label>
				
				<a href="javascript:void(0)" data-etailingcode="{{ $product->sku }}" data-etailingname="{{ $product->sku }}" data-etailingcat="{{ $product->category->name }}" onclick="etailing_btn_comprar(this);" class="btn link staggered-animation btn-responsive" data-os-animation-delay="1s">Comprar</a>

			</div>
			@endforeach
			<!-- -->

		</div>
		@endif

	</section>
	@endif
	@endforeach
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