<header class="header">

    <div class="container">

        <div class="block_menu_1">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('assets/imgs/iconos/noblex.svg') }}" alt="Noblex" />
                </a>
            </div>

            <div class="menu">
                <ul>
                    @foreach($menu_raiz->childs as $cat)
                        @if($cat->visible)
                            <li>
                                <a href="#" class="main-cat">{{ $cat->name }}</a>
                                <?php $childs = $cat->menuChilds(); ?>
                                @if(count($childs))

                                <div class="submenu">
                                    <div class="submenu_content">
                                        <button class="close" type="button">
                                            <span class="fa fa-times"></span>
                                            <span class="sr-only">Cerrar</span>
                                        </button>

                                        <div class="content">
                                            <span><strong>{{ $cat->name }}</strong></span>
                                            
                                                @foreach($childs as $sub)
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="sub-cat">{{ $sub->name }}</a>
                                                            <div class="cat-desc">
                                                                @if($sub->feautured)
                                                                <!-- CONTENIDO COLUMNA 2 -->
                                                                <a href="#">
                                                                    <p class="title"><strong>Último lanzamiento</strong></p>
                                                                    <p>{{ $sub->feautured->name }} <strong>{{ $sub->feautured->short_description }}</strong></p>
                                                                    <?php
                                                                        $img = $sub->feautured->productsMedia->where('featured', 1)->first();
                                                                    ?>
                                                                    @if($img)
                                                                    <img src="{{ asset('storage/'.$img->source) }}" alt="{{ $sub->feautured->name }}" />
                                                                    @endif
                                                                </a>
                                                                @endif
                                                                <!-- FIN CONTENIDO COLUMNA 2 -->

                                                                @if($sub->info->count())
                                                                <div class="info">
                                                                    <!-- CONTENIDO COLUMNA 3 -->
                                                                    <p class="title"><strong>Info de interés</strong></p>

                                                                    @foreach($sub->info as $info)
                                                                    <a href="{{ $info->url }}">{{ $info->text }}</a>
                                                                    @endforeach

                                                                    <!-- CONTENIDO COLUMNA 3 -->
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="block_menu_2">

            <!-- CUANDO EL USUARIO ESTÁ LOGUEADO -->

            <div class="user">
                <a href="#">Hola <strong>Juana María</strong></a>

                <div class="submenu">
                    <ul>
                        <li>
                            <a href="#">Preferencias</a>
                        </li>
                        <li>
                            <a href="#">Salir de la cuenta</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- -->




            <!-- CUANDO EL USUARIO NO ESTÁ LOGUEADO -->

            <!-- <div class="user">
                <a href="#"><strong>Mi cuenta</strong></a>

                <div class="submenu">
                    <ul>
                        <li>
                            <a href="#">Ingresar</a>
                        </li>
                        <li>
                            <a href="#">Registrarme</a>
                        </li>
                    </ul>
                </div>
            </div> -->

            <!-- FIN NO LOGUEADO -->



            <div class="search_box">
                <form>
                    <div class="search_input">
                        <div>
                            <input type="text" placeholder="Buscar producto" />
                        </div>
                    </div>

                    <!-- RESULTADOS -->
                    <div class="results">
                        <ul>
                            <li>
                                <a href="#">Resultado predictivo</a>
                            </li>
                            <li>
                                <a href="#">Resultado predictivo</a>
                            </li>
                            <li>
                                <a href="#">Resultado predictivo</a>
                            </li>
                            <li>
                                <a href="#">Resultado predictivo</a>
                            </li>
                        </ul>
                    </div>
                    <!-- FIN RESULTADOS -->

                    <button type="button" class="search_btn">
                        <span class="fas fa-search"></span>
                        <span class="sr-only">Buscar</span>
                    </button>
                </form>
            </div>

            <button class="btn_menu">
                <span class="fa fa-bars"></span>
                <span class="sr-only">Menu</span>
            </button>
        </div>

    </div>

</header>

<!-- MENÚ MOBILE -->

<div class="menu_mobile">
    <div class="menu">
        <div class="container">


            <!-- LA CLASE "open" ABRE EL MENÚ -->

            <ul>
                <li>
                    <a href="#">Smartphone</a>
                </li>
                <li>
                    <a href="#">Smartwatch</a>

                    <ul>
                        <li>
                            <a href="#">Smart 4k</a>
                        </li>
                        <li>
                            <a href="#">Smart</a>
                        </li>
                        <li>
                            <a href="#">LED</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">E-reader</a>

                    <ul>
                        <li>
                            <a href="#">Adorables</a>
                        </li>
                        <li>
                            <a href="#">Auriculares</a>
                        </li>
                        <li>
                            <a href="#">Hogar</a>
                        </li>
                        <li>
                            <a href="#">Portatil</a>
                        </li>
                        <li>
                            <a href="#">Auto</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Audio</a>

                    <ul>
                        <li>
                            <a href="#">Adorables</a>
                        </li>
                        <li>
                            <a href="#">Auriculares</a>
                        </li>
                        <li>
                            <a href="#">Hogar</a>
                        </li>
                        <li>
                            <a href="#">Portatil</a>
                        </li>
                        <li>
                            <a href="#">Auto</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">TV</a>
                </li>
                <li>
                    <a href="#">Tablets</a>
                </li>
                <li>
                    <a href="#">Aires Acondicionados</a>
                </li>
                <li>
                    <a href="#">Otros</a>

                    <ul>
                        <li>
                            <a href="#">Adorables</a>
                        </li>
                        <li>
                            <a href="#">Auriculares</a>
                        </li>
                        <li>
                            <a href="#">Hogar</a>
                        </li>
                        <li>
                            <a href="#">Portatil</a>
                        </li>
                        <li>
                            <a href="#">Auto</a>
                        </li>
                    </ul>
                </li>
            </ul>

            
            <div class="search_box">
                <form>
                    <div class="search_input">
                        <div>
                            <input type="text" placeholder="Buscar productos" />
                        </div>
                    </div>

                    <button type="button" class="search_btn">
                        <span class="fas fa-search"></span>
                        <span class="sr-only">Buscar</span>
                    </button>
                </form>
            </div>

        </div>
    </div>

    <div class="user">
        <div class="container">

            <ul>
                <li>
                    <a href="#"><strong>Mi cuenta</strong></a>
                    
                    <ul>
                        <li>
                            <a href="#">Ingresar</a>
                        </li>
                        <li>
                            <a href="#">Registrarme</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</div>

<!-- FIN MENÚ MOBILE -->
@push('scripts')
    <script>
        $(document).on('ready', function(){

            $('.cat-desc').hide();

            $('.main-cat').on('mouseenter', function(){
                $($(this).parent().find('ul')[0]).find('.cat-desc').show();
                console.log();
            })

            $(".sub-cat").on('mouseenter', function(e){
                $('.cat-desc').hide();
                $(this).next('.cat-desc').show();
            })
        })
    </script>
@endpush