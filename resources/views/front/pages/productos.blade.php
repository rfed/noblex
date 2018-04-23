@extends('front.layouts.app')

@section('includes.admin.breadcrumbs')
	{{ Breadcrumbs::render('home') }}
@endsection

@section('content')

	<section>
		<div class="container">
			
			<!-- MOBILE -->
			<div class="product_banner mobile">
				<h1 class="title">LED TV Smart 65" Full UHD</h1>
				<span class="code">DA65X6500X</span>

				<p class="text">Más Smart, mas diversión.</p>
			</div>
			<!-- END MOBILE -->

			<div class="product_banner">
				<div class="info">
					<h1 class="title">LED TV Smart 65" Full UHD</h1>
					<span class="code">DA65X6500X</span>

					<p class="text">Más Smart, mas diversión.</p>

					<div class="features">
						<img src="assets/imgs/iconos/ultra_hd_white.png" alt="Ultra HD" />
						<img src="assets/imgs/iconos/sound_white.png" alt="" />
						<img src="assets/imgs/iconos/xmotion_white.png" alt="Xmotion" />
						<img src="assets/imgs/iconos/smart_white.png" alt="Smart" />
						<img src="assets/imgs/iconos/youtube_white.png" alt="YouTube" />
						<img src="assets/imgs/iconos/netflix_white.png" alt="Netflix" />
					</div>
				</div>

				<div class="image">
					<img src="assets/imgs/imagenes/product_5.png" alt='LED TV Smart 65" Full UHD' />

					<div class="features">
						<img src="assets/imgs/iconos/ultra_hd_white.png" alt="Ultra HD" />
						<img src="assets/imgs/iconos/sound_white.png" alt="" />
						<img src="assets/imgs/iconos/xmotion_white.png" alt="Xmotion" />
						<img src="assets/imgs/iconos/smart_white.png" alt="Smart" />
						<img src="assets/imgs/iconos/youtube_white.png" alt="YouTube" />
						<img src="assets/imgs/iconos/netflix_white.png" alt="Netflix" />
					</div>
				</div>
			</div>


			<div class="tools_content">
				<div class="section_tools">
					<a href="#">
						<span class="fa fa-file-alt"></span>
						<span>Descargar Manuales de usuario</span>
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

					<div class="item">
						<img src="assets/imgs/imagenes/product_1.png" alt="imagen 1" />
					</div>

					<div class="item">
						<img src="assets/imgs/imagenes/product_2.png" alt="imagen 2" />
					</div>

					<div class="item">
						<img src="assets/imgs/imagenes/product_3.png" alt="imagen 3" />
					</div>

				</div>
			</div>


			<div class="features_list col-xs-12 col-sm-4">
				<div class="item">
					<img src="assets/imgs/iconos/play_share.png" alt="Play & Share" />
					<p><strong>Play &amp; Share</strong></p>
					<p>Compartir contenido fácilmente a través de distintos dispositivos</p>
				</div>

				<div class="item">
					<img src="assets/imgs/iconos/usb.png" alt="HDMI / USB / VGA" />
					<p><strong>HDMI / USB / VGA</strong></p>
					<p>Conectá todos tus periféricos como PCs, pendrives y consolas</p>
				</div>

				<div class="item">
					<img src="assets/imgs/iconos/bluetooth.png" alt="Bluetooth" />
					<p><strong>Bluetooth</strong></p>
					<p>Conectá todos tus periféricos como PCs, pendrives y consolas</p>
				</div>

				<div class="item">
					<img src="assets/imgs/iconos/tda.png" alt="TDA" />
					<p><strong>TDA</strong></p>
					<p>Sintonizador Digital Incorporado (TDA) Ginga</p>
				</div>
			</div>

		</div>
	</section>

	<!--
		h2 -> titulo
		span -> bajada
		p -> texto descriptivo
	 -->

	<section class="product_detail_contain container">
		<h2>Diseño y tecnología</h2>
		<span>Disfruta de la mejor experiencia en tu propio living.</span>


		<div>
			<img src="assets/imgs/imagenes/producto_banner.png" alt="Play & Share" />

			<div class="align_left">
				<h2>Play &amp; Share</h2>
				<span>Conectividad para todos tus dispositivos.</span>

				<p>Tu Smart TV Noblex trae la aplicación Play &amp; Share, para que compartas contenido fácilmente a través de distintos dispositivos. Además, con HDMI, USB y VGA, conectá todos tus periféricos como PCs, pen drives y consolas al mejor televisor de tu casa, de manera fácil y veloz.</p>
			</div>
		</div>


		<div>
			<img src="assets/imgs/imagenes/producto_banner_2.png" alt="Jugá a lo grande" />

			<div class="align_right">
				<h2>Jugá a lo grande</h2>
				<span>Tasa de refresco y tiempos de respuesta mejorados</span>
				<p>Tu Smart TV Noblex trae la aplicación Play &amp; Share, para que compartas contenido fácilmente a través de distintos dispositivos. Además, con HDMI, USB y VGA, conectá todos tus periféricos como PCs, pen drives y consolas al mejor televisor de tu casa, de manera fácil y veloz.</p>
			</div>

		</div>


		<div>
			<img src="assets/imgs/imagenes/producto_banner_3.png" alt="Full UHD" />
			<h2>Full UHD</h2>

			<p>Hablamos de verdadera alta resolución. 4k es la abreviatura de 4.000 píxeles (4096 x 2160 píxeles)</p>
		</div>

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

			<div class="item">
				<a href="#">
					<div class="image">
						<img src="assets/imgs/imagenes/product_1.png" alt='LED TV Smart 65" Full UHD' />

						<span class="feature"><span>65"</span></span>
					</div>
					<span class="id">DA65X500X</span>
					<p class="title"><strong>LED TV Smart 65" Full UHD</strong></p>
					<span class="description">Conectividad para todos tus dispositivos 4K2K (3840 x 2160 pixeles) Bluetooth</span>
				</a>

				<label class="checkbox">
					<input type="checkbox" value="comparar" />
					<span>Comparar</span>
				</label>
				
				<a href="#" class="btn link">Comprar</a>
			</div>

			<!-- -->

			<div class="item">
				<a href="#">
					<div class="image">
						<img src="assets/imgs/imagenes/product_2.png" alt='LED TV Smart 65" Full UHD' />
					</div>
					<span class="id">DA65X500X</span>
					<p class="title"><strong>LED TV Smart 65" Full UHD</strong></p>
					<span class="description">Conectividad para todos tus dispositivos 4K2K (3840 x 2160 pixeles) Bluetooth</span>
				</a>

				<label class="checkbox">
					<input type="checkbox" value="comparar" />
					<span>Comparar</span>
				</label>
				
				<a href="#" class="btn link">Comprar</a>
			</div>

			<!-- -->

			<div class="item">
				<a href="#">
					<div class="image">
						<img src="assets/imgs/imagenes/product_3.png" alt='LED TV Smart 65" Full UHD' />
					</div>
					<span class="id">DA65X500X</span>
					<p class="title"><strong>LED TV Smart 65" Full UHD</strong></p>
					<span class="description">Conectividad para todos tus dispositivos 4K2K (3840 x 2160 pixeles) Bluetooth</span>
				</a>

				<label class="checkbox">
					<input type="checkbox" value="comparar" />
					<span>Comparar</span>
				</label>
				
				<a href="#" class="btn link">Comprar</a>
			</div>

			<!-- -->

			<div class="item">
				<a href="#">
					<div class="image">
						<img src="assets/imgs/imagenes/product_3.png" alt='LED TV Smart 65" Full UHD' />

						<span class="feature"><span>65"</span></span>
					</div>
					<span class="id">DA65X500X</span>
					<p class="title"><strong>LED TV Smart 65" Full UHD</strong></p>
					<span class="description">Conectividad para todos tus dispositivos 4K2K (3840 x 2160 pixeles) Bluetooth</span>
				</a>

				<label class="checkbox">
					<input type="checkbox" value="comparar" />
					<span>Comparar</span>
				</label>
				
				<a href="#" class="btn link">Comprar</a>
			</div>

			<!-- -->

			<div class="item">
				<a href="#">
					<div class="image">
						<img src="assets/imgs/imagenes/product_3.png" alt='LED TV Smart 65" Full UHD' />
					</div>
					<span class="id">DA65X500X</span>
					<p class="title"><strong>LED TV Smart 65" Full UHD</strong></p>
					<span class="description">Conectividad para todos tus dispositivos 4K2K (3840 x 2160 pixeles) Bluetooth</span>
				</a>

				<label class="checkbox">
					<input type="checkbox" value="comparar" />
					<span>Comparar</span>
				</label>
				
				<a href="#" class="btn link">Comprar</a>
			</div>

			<!-- -->

			<div class="item">
				<a href="#">
					<div class="image">
						<img src="assets/imgs/imagenes/product_3.png" alt='LED TV Smart 65" Full UHD' />
					</div>
					<span class="id">DA65X500X</span>
					<p class="title"><strong>LED TV Smart 65" Full UHD</strong></p>
					<span class="description">Conectividad para todos tus dispositivos 4K2K (3840 x 2160 pixeles) Bluetooth</span>
				</a>

				<label class="checkbox">
					<input type="checkbox" value="comparar" />
					<span>Comparar</span>
				</label>
				
				<a href="#" class="btn link">Comprar</a>
			</div>

			<!-- -->

			<div class="item">
				<a href="#">
					<div class="image">
						<img src="assets/imgs/imagenes/product_3.png" alt='LED TV Smart 65" Full UHD' />
					</div>
					<span class="id">DA65X500X</span>
					<p class="title"><strong>LED TV Smart 65" Full UHD</strong></p>
					<span class="description">Conectividad para todos tus dispositivos 4K2K (3840 x 2160 pixeles) Bluetooth</span>
				</a>

				<label class="checkbox">
					<input type="checkbox" value="comparar" />
					<span>Comparar</span>
				</label>
				
				<a href="#" class="btn link">Comprar</a>
			</div>

			<!-- -->

			<div class="item">
				<a href="#">
					<div class="image">
						<img src="assets/imgs/imagenes/product_3.png" alt='LED TV Smart 65" Full UHD' />
					</div>
					<span class="id">DA65X500X</span>
					<p class="title"><strong>LED TV Smart 65" Full UHD</strong></p>
					<span class="description">Conectividad para todos tus dispositivos 4K2K (3840 x 2160 pixeles) Bluetooth</span>
				</a>

				<label class="checkbox">
					<input type="checkbox" value="comparar" />
					<span>Comparar</span>
				</label>
				
				<a href="#" class="btn link">Comprar</a>
			</div>

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