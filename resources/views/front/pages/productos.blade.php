@extends('front.layouts.app')

@section('includes.admin.breadcrumbs')
	{{ Breadcrumbs::render('home') }}
@endsection

@section('content')

	@php
		$imageBackground = ''; 
		$imageFeatured = '';
		$galeria = FALSE;
	@endphp

	@foreach($product->productsMedia as $productMedia)
		@if($productMedia->type == 'image_featured_background')
			<?php $imageBackground = url("storage/".$productMedia->source); ?>
		@endif

		@if($productMedia->type == 'image_featured')
			<?php $imageFeatured = url("storage/".$productMedia->source); ?>
		@endif

		@if ($productMedia->type == 'image')
			<?php $galeria = TRUE; ?>
		@endif
	@endforeach

	<section>
		<div class="container">
			
			<!-- MOBILE -->
			<div class="product_banner mobile" style="background-image:url({{ $imageBackground  }})">
				<h1 class="title">{{ $product->name }}</h1>
				<span class="code">{{ $product->sku }}</span>

				<p class="text">Más Smart, mas diversión.</p>
			</div>
			<!-- END MOBILE -->
			
			
			<div class="product_banner" style="background-image:url({{ $imageBackground  }})">
				<div class="info">
					<h1 class="title">{{ $product->name }}</h1>
					<span class="code">{{ $product->sku }}</span>

					<p class="text">Más Smart, mas diversión.</p>

					<div class="features">
						@foreach($product->features as $feature)
							<img src="{{ url("storage/$feature->image") }}" alt="{{ $feature->name }}" />
						@endforeach
					</div>
				</div>

				<div class="image">
					<img src="{{ $imageFeatured }}" alt="{{ $product->name }}">

					<div class="features">
						@foreach($product->features as $feature)
							<img src="{{ url("storage/$feature->image") }}" alt="{{ $feature->name }}" />
						@endforeach
					</div>
				</div>
			</div>


			<div class="tools_content">
				<div class="section_tools">
					@if($product->manual)
						<a href='{{ url("storage/$product->manual") }}' download>
							<span class="fa fa-file-alt"></span>
							<span>Descargar Manual de usuario</span>
						</a>
					@endif

					<a href="#" class="triggerChat">
						<span class="fa fa-wrench"></span>
						<span>Soporte</span>
					</a>
				</div>

				<div class="buy_btn">
					<a href="javascript:void(0)" data-etailingcode="{{ $product->sku }}" data-etailingname="{{ $product->sku }}" data-etailingcat="{{ $product->category->name }}" onclick="etailing_btn_comprar(this);" class="btn link staggered-animation btn-responsive" data-os-animation-delay="1s">Comprar</a>
				</div>
			</div>

		</div>
	</section>


	@if ($galeria)
	<section class="container">
		<div class="row">

			<div class="col-xs-12 col-sm-8">
				<div class="product_view owl-carousel">
					
					@foreach($product->productsMedia as $image)
						@if($image->type == 'image')
							<div class="item">
								<img src="{{ url("storage/$image->source") }}" alt='{{ $product->name }}' />
							</div>
						@endif
					@endforeach

				</div>
			</div>


			<div class="features_list col-xs-12 col-sm-4">

				@foreach($product->features as $feature)
					<div class="item">
						<img src="{{ url("storage/$feature->image") }}" alt="{{ $feature->name }}" />
						<p><strong>{{ $feature->name }}</strong></p>
						<p>{{ $feature->description }}</p>
					</div>
				@endforeach
		
			</div>

		</div>
	</section>
	@endif
	
	<section class="product_detail_contain container">
		<!-- <h2>Diseño y tecnología</h2>
		<span>Disfruta de la mejor experiencia en tu propio living.</span> -->

		@foreach($product->sectionproducts as $sectionproduct)
			
			@if(!$sectionproduct->source)
				<h2>{{ $sectionproduct->title }}</h2>
				<span>{{ $sectionproduct->subtitle }}</span>
			@endif

			@switch($sectionproduct->alignment)
				@case('izquierda')
					<?php $position = 'align_left'; ?>
				@break

				@case('derecha')
					<?php $position = 'align_right'; ?>
				@break

				@default
					<?php $position = ''; ?>
				@break
			@endswitch
			
			@if($sectionproduct->source)
				<div>
					<img src="{{ url("storage/$sectionproduct->source") }}" alt="{{ $sectionproduct->title }}" />
				
					<div class="{{$position}}">
						<h2>{{ $sectionproduct->title }}</h2>
						<span>{{ $sectionproduct->subtitle }}</span>

						<p>{{ $sectionproduct->description }}</p>
					</div>
				</div>
			@endif

		@endforeach

	</section>


	<section class="divider details">
		<div class="container">

			<div class="section_head">
				<button class="btn show_hide open">Ocultar</button>
				<h3>Características y prestaciones</h3>
			</div>

			<div class="table">
				@foreach($product->attributesWithGroup() as $group)
				<div class="section">
					<div class="head">
						<p><strong>{{ $group['group']->name }}</strong></p>
					</div>
					@foreach($group['attributes'] as $k => $attribute)
					<div>
						<p>{{ $attribute->name }}</p>
						<p><strong>{{ $attribute->pivot->value }}</strong></p>
					</div>
					@endforeach
				</div>
				@endforeach

		        <?php $sinagrupar = $product->attributesWithoutGroup() ;?>
		        
		        @if(!empty($sinagrupar) and count($sinagrupar) > 0)
				<div class="section">
					@foreach($sinagrupar as $attribute)
					<div>
						<p>{{ $attribute->name }}</p>
						<p><strong>{{ $attribute->pivot->value }}</strong></p>
					</div>
					@endforeach
				</div>
				@endif
			</div>

		</div>
	</section>


	@if (count($relatedproducts))
	<section class="divider related_products">

		<div class="container">
			<p><strong>Más productos</strong> en la misma categoría</p>
		</div>

		<div class="product_list_carousel owl-carousel">

			<!-- -->

			@foreach($relatedproducts as $relatedproduct)

				<div class="item">
					<a href="#">
						<div class="image">
							
							<img src="{{ url("storage/$relatedproduct->source") }}" alt='{{ $relatedproduct->product->name }}' />

							<span class="feature"><span>{{ $relatedproduct->product->cucarda }}</span></span>

						</div>

						<span class="id">{{ $relatedproduct->product->sku }}</span>
						<p class="title"><strong>{{ $relatedproduct->product->name }}</strong></p>
						<span class="description">{{ $relatedproduct->product->description }}</span>
					</a>

					<label class="checkbox">
						<input type="checkbox" value="comparar" />
						<span>Comparar</span>
					</label>
					
					<a href="#" class="btn link">Comprar</a>
				</div>

			@endforeach

			<!-- -->

		</div>
	</section>
	@endif

	<section class="divider">
		<div class="container">

			<a href="#">
				<img src="/assets/imgs/imagenes/banner_4.png" alt="Vamos Argentina - NOBLEX proveedor Oficial de la Selección Argentina" />
			</a>

		</div>
	</section>

</main>

@endsection