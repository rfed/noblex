@extends('front.layouts.app')

@section('includes.admin.breadcrumbs')
	{{ Breadcrumbs::render('home') }}
@endsection

@section('content')

	<section>
		<div class="container">
			
			<?php $imageBackground = ''; ?>
			@foreach($product->productsMedia as $productMedia)
				@if($productMedia->type == 'image_featured_background')
					<?php $imageBackground = url("storage/".$productMedia->source); ?>
				@endif
			@endforeach

			<!-- MOBILE -->
			<div class="product_banner mobile" style="background:url({{ $imageBackground  }})">
				<h1 class="title">{{ $product->name }}</h1>
				<span class="code">{{ $product->sku }}</span>

				<p class="text">Más Smart, mas diversión.</p>
			</div>
			<!-- END MOBILE -->
			
			
			<div class="product_banner" style="background:url({{ $imageBackground  }})">
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
					
					<div class="features">
						@foreach($product->features as $feature)
							<img src="{{ url("storage/$feature->image") }}" alt="{{ $feature->name }}" />
						@endforeach
					</div>
				</div>
			</div>


			<div class="tools_content">
				<div class="section_tools">
					<a href="#">
						<span class="fa fa-file-alt"></span>
						@foreach($product->productsMedia as $productMedia)
							@if($productMedia->type == 'document')
								<a href="{{ $productMedia->source }}">Descargar Manuales de usuario</span>
							@endif
						@endforeach
					</a>

					<a href="#">
						<span class="fa fa-wrench"></span>
						<span>Soporte</span>
					</a>
				</div>

				<div class="buy_btn">
					<a href="#" class="btn link">Comprar</a>
				</div>
			</div>

		</div>
	</section>



	<section class="container">
		<div class="row">

			<div class="col-xs-12 col-sm-8">
				<div class="product_view owl-carousel">
					
					@foreach($product->productsMedia as $image)
						<div class="item">
							<img src="{{ url("storage/$image->source") }}" alt='{{ $product->name }}' />
						</div>
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

	<!--
		h2 -> titulo
		span -> bajada
		p -> texto descriptivo
	 -->

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
				<div class="section">
					<div class="head">
						<p><strong>Pantalla</strong></p>
					</div>
					<div>
						<p>Resolución</p>
						<p><strong>4K2K 3840 x 2160 px</strong></p>
					</div>
					<div>
						<p>Tasa de refresco</p>
						<p><strong>60hz</strong></p>
					</div>
					<div>
						<p>Tiempo derespuesta</p>
						<p><strong>8ms</strong></p>
					</div>
					<div>
						<p>Contraste</p>
						<p><strong>4000:1</strong></p>
					</div>
				</div>


				<div class="section">
					<div class="head">
						<p><strong>Aplicaciones</strong></p>
					</div>
					<div>
						<p>Disponibles</p>
						<p>Netflix, YouTube, Browser, Clarovideo, Telefe, América TV, Qubit, Personal Video, La Nación, Infobae, Atma en tu cocina, Redbull TV y muchas más disponibles.</p>
					</div>
				</div>


				<div class="section">
					<div class="head">
						<p><strong>Conectividad</strong></p>
					</div>
					<div>
						<p>Puertos</p>
						<p><strong>HDMI x 4 - USB x 3</strong></p>
					</div>
					<div>
						<p>Bluetooth</p>
						<p><strong>Sí</strong></p>
					</div>
				</div>


				<div class="section">
					<div class="head">
						<p><strong>Adicionales</strong></p>
					</div>
					<div>
						<p>play &amp; Share</p>
						<p><strong>Sí</strong></p>
					</div>
					<div>
						<p>Sintonizador Digital TDA</p>
						<p><strong>Ginga integrado</strong></p>
					</div>
					<div>
						<p>Sintonizador Digital TDA</p>
						<p><strong>Ginga integrado</strong></p>
					</div>
				</div>


				<div class="section">
					<div class="head">
						<p><strong>Audio</strong></p>
					</div>
					<div>
						<p>Salida de Audio</p>
						<p><strong>Optica</strong></p>
					</div>
					<div>
						<p>Potencia de parlantes</p>
						<p><strong>Sí</strong></p>
					</div>
				</div>

				
				<div class="section">
					<div class="head">
						<p><strong>Otros</strong></p>
					</div>
					<div>
						<p>Play &amp; Share</p>
						<p><strong>Sí</strong></p>
					</div>
					<div>
						<p>sintonizador Digital TDA</p>
						<p><strong>No</strong></p>
					</div>
				</div>

			</div>
		</div>
	</section>



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


	<section class="divider">
		<div class="container">

			<a href="#">
				<img src="assets/imgs/imagenes/banner_4.png" alt="Vamos Argentina - NOBLEX proveedor Oficial de la Selección Argentina" />
			</a>

		</div>
	</section>

</main>

@endsection