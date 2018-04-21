@extends('front.layouts.app')

@section('includes.admin.breadcrumbs')
	{{ Breadcrumbs::render('home') }}
@endsection

@section('content')
    
<section>
    
    <div class="container">
        
        <div class="row">

            <div class="carousel_product_box_link owl-carousel dots">
                <!-- -->
                <div class="item product_box_link">
                    <div class="image">
                        <a href="#">
                            <img src="assets/imgs/imagenes/banner_1.png" alt="Móviles" />
                        </a>
                    </div>

                    <div class="info">
                        <div class="half_block">
                            <p class="strong"><strong>Nuevos smartphones inspirados en vos</strong></p>
                        </div>

                        <div class="half_block">
                            <p>Sabemos la importancia que le das a al comunicación. Nuestra línea está inspirada en vos y fue creada 100% pensando en tu comodidad.</p>
                        </div>

                        <div class="link_block">
                            <a href="#" class="btn link">Ver todos</a>
                        </div>
                    </div>
                </div>

                <!-- -->

                <div class="item product_box_link">
                    <div class="image">
                        <img src="assets/imgs/imagenes/banner_1.png" alt="Móviles" />
                    </div>

                    <div class="info">
                        <div class="half_block">
                            <p class="strong"><strong>Nuevos smartphones inspirados en vos</strong></p>
                        </div>

                        <div class="half_block">
                            <p>Sabemos la importancia que le das a al comunicación. Nuestra línea está inspirada en vos y fue creada 100% pensando en tu comodidad.</p>
                        </div>

                        <div class="link_block">
                            <a href="#" class="btn link">Ver todos</a>
                        </div>
                    </div>
                </div>

                <!-- -->

            </div>

        </div>
    </div>
</section>



<section class="divider">
    <div class="container">
        <div class="row">

            <div class="item product_box_link">
                <div class="image">
                    <a href="#">
                        <img src="assets/imgs/imagenes/banner_2.png" alt="Smartwatch" />
                    </a>
                </div>

                <div class="info">
                    <div class="half_block">
                        <p class="strong"><strong>Tecnología al alcance de tu mano</strong></p>
                    </div>

                    <div class="half_block">
                        <p>Ahora podés: Atender el teléfono, desbloquear el reloj y navegar el menú mediante el movimiento de tu muñeca, gracias a la función Smart Gesture. Y más!</p>
                    </div>

                    <div class="link_block">
                        <a href="#" class="btn link">Ver todos</a>
                    </div>
                </div>
            </div>

        </div>


        <div class="product_links_bar">
            <div class="col-xs-12 col-sm-4">
                <a href="#">
                    <img src="assets/imgs/imagenes/mini_product_1.png" alt="Smartwatch" />
                </a>
            </div>

            <div class="col-xs-12 col-sm-4">
                <a href="#">
                    <img src="assets/imgs/imagenes/mini_product_2.png" alt="Smartwatch" />
                </a>
            </div>

            <div class="col-xs-12 col-sm-4">
                <a href="#">
                    <img src="assets/imgs/imagenes/mini_product_3.png" alt="Smartwatch" />
                </a>
            </div>
        </div>

    </div>
</section>



<section class="divider">
    <div class="container">
        <div class="row">

            <div class="item product_box_link">
                <div class="image">
                    <a href="#">
                        <img src="assets/imgs/imagenes/banner_3.png" alt="TV" />
                    </a>
                </div>

                <div class="info">
                    <div class="half_block">
                        <p class="strong sizefix"><strong>Conocé nuestra línea y disfrutá del mundial</strong></p>
                    </div>

                    <div class="full_block no_padding">
                        <div>
                            <p>Experimentá la emoción de ver imágenes en la mejor definición y resolución. Accedé a lo mejor de Internet.</p>
                        </div>
                        <div>
                            <div class="features">
                                <img src="assets/imgs/iconos/ultra_hd.png" alt="Ultra HD" />
                                <img src="assets/imgs/iconos/sound.png" alt="" />
                                <img src="assets/imgs/iconos/xmotion.png" alt="Xmotion" />
                                <img src="assets/imgs/iconos/smart.png" alt="Smart" />
                                <img src="assets/imgs/iconos/youtube.png" alt="YouTube" />
                                <img src="assets/imgs/iconos/netflix.png" alt="Netflix" />
                            </div>
                        </div>
                    </div>

                    <div class="link_block">
                        <a href="#" class="btn link">Ver todos</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">

            <div class="big product_box_link">
                <a href="#">
                    <img src="assets/imgs/imagenes/video.png" alt="Video" />
                </a>

                <div class="info">
                    <div class="full_block">
                        <p class="strong"><strong>Verdadera alta definición</strong></p>

                        <p>Viví el mundial mejor que en el estadio</p>

                        <span>Hablamos de verdadera alta resolución. 4k es la abreviatura de de 4.000 píxeles (4096 x 2160 píxeles)</span>
                    </div>
                </div>
            </div>

        </div>
    </div>




    <div class="padding_bottom product_list_carousel owl-carousel">

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

                <button class="btn link">Comprar</button>
            </a>
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

                <button class="btn link">Comprar</button>
            </a>
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

                <button class="btn link">Comprar</button>
            </a>
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

                <button class="btn link">Comprar</button>
            </a>
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

                <button class="btn link">Comprar</button>
            </a>
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

                <button class="btn link">Comprar</button>
            </a>
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

                <button class="btn link">Comprar</button>
            </a>
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

                <button class="btn link">Comprar</button>
            </a>
        </div>

        <!-- -->

    </div>

</section>



<section class="divider promobox">
    <div class="container">
        <div class="row">

            <div class="item col-xs-6">
                <a href="#">
                    <img src="assets/imgs/imagenes/promo_1.png" alt="Conocé nuestros productos en la Tienda Oficinal de MercadoLibre" />
                </a>
            </div>

            <div class="item col-xs-6">
                <a href="#">
                    <img src="assets/imgs/imagenes/promo_2.png" alt="Tablets - pura diversión en todo momento y lugar" />
                </a>
            </div>

            <div class="item col-xs-6">
                <a href="#">
                    <img src="assets/imgs/imagenes/promo_3.png" alt="Headphones - Genial que tus oídos vean" />
                </a>
            </div>

            <div class="item col-xs-6">
                <a href="#">
                    <img src="assets/imgs/imagenes/promo_4.png" alt="E-reader En todo lugar y en todo tiempo" />
                </a>
            </div>

        </div>
    </div>
</section>



<section class="divider">
    <div class="container">

        <a href="#">
            <img src="assets/imgs/imagenes/banner_4.png" alt="Vamos Argentina - NOBLEX proveedor Oficial de la Selección Argentina" />
        </a>

    </div>
</section>

@endsection
