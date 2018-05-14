<link rel="stylesheet" href="{{ asset('assets/jquery/jquery-ui/jquery-ui.min.css') }}">

<header class="header">

    <div class="container">

        <div class="block_menu_1">
            <div class="logo">
                <a href="{{ url('') }}">
                    <img src="{{ asset('assets/imgs/iconos/noblex.svg') }}" alt="Noblex" />
                </a>
            </div>

            <div class="menu">
                <ul>
                    @foreach($menu_raiz->getChildsOrdered() as $cat)
                        @if($cat->visible)
                            <li>
                                <a href="{{ url($cat->url) }}" class="main-cat">{{ $cat->name }}</a>
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
                                                            <a href="{{ url($sub->url) }}" class="sub-cat">{{ $sub->name }}</a>
                                                            <div class="cat-desc">
                                                                @if($sub->feautured)
                                                                <!-- CONTENIDO COLUMNA 2 -->
                                                                <a href="{{ url($sub->feautured->category->url.'/'.$sub->feautured->sku) }}">
                                                                    <p class="title"><strong>Último lanzamiento</strong></p>
                                                                    <p>{{ $sub->feautured->name }} <strong>{{ $sub->feautured->short_description }}</strong></p>
                                                                    <img src="{{ asset('storage/'.(isset($sub->featured) && $sub->featured->thumb ? $sub->feautured->thumb->source : 'no-foto.png')) }}" alt="{{ $sub->feautured->name }}" />
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
            @if(!Auth::guard('customer')->check())
            <div class="user">
                <a href="{{ route('login') }}"><strong>Mi cuenta</strong></a>

                <div class="submenu">
                    <ul>
                        <li>
                            <a href="{{ route('login') }}">Ingresar</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Registrarme</a>
                        </li>
                    </ul>
                </div>
            </div>
            @else
            <div class="user">
                <a href="{{ route('perfil.edit') }}">Hola <strong>{{ Auth::guard('customer')->user()->firstname }}</strong></a>

                <div class="submenu">
                    <ul>
                        <li>
                            <a href="{{ route('perfil.edit') }}">Perfil</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Salir de la cuenta
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
            <!-- -->

            <div class="search_box">
                <form action="{{ route('busqueda.index') }}" method="GET">

                    <div class="search_input">
                        <div>
                            <input type="text" name="buscar" id="buscar" placeholder="Buscar producto" autocomplete="off" />
                        </div>
                    </div>

                    <!-- RESULTADOS -->
                    <div class="results">
                        <ul id="resultados">
                            <!-- <li>
                                <a href="#"></a>
                            </li> -->
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

            <ul>
                @foreach($menu_raiz->getChildsOrdered() as $cat)
                    @if($cat->visible)
                    <?php $childs = $cat->menuChilds(); ?>
                    <li>
                        <a href="{{ count($childs) ? '#' : url($cat->url) }}">{{ $cat->name }}</a>
                        @if(count($childs))                    
                        <ul>
                            @foreach($childs as $sub)
                            <li>
                                <a href="{{ url($sub->url) }}" class="sub-cat">{{ $sub->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endif
                @endforeach
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

    @if(!Auth::guard('customer')->check())
    <div class="user">
        <div class="container">
            <ul>
                <li>
                    <a href="#"><strong>Mi cuenta</strong></a>
                    
                    <ul>
                        <li>
                            <a href="{{ route('login') }}">Ingresar</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Registrarme</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    @else
    <div class="user">
        <div class="container">
            <ul>
                <li>
                    <a href="{{ route('perfil.edit') }}">Hola <strong>{{ Auth::guard('customer')->user()->firstname }}</strong></a>

                    <ul>
                        <li>
                            <a href="{{ route('perfil.edit') }}">Perfil</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Salir de la cuenta
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    @endif
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
            });

            $('.results').hide();

            $("#buscar").on('keyup', function(){
                let value = $(this).val();

                $('#resultados').empty();

                if(value.length > 2)
                {
                    $('.results').show();

                    $.ajax({
                        url: '/autocomplete',
                        type: 'GET',
                        dataType: 'json',
                        data: {data: value},
                    })
                    .done(function(data) {

                        for(let item in data)
                        {
                            $('#resultados').append('<li><a href="'+data[item].url+'">'+data[item].name+'</a></li>');
                        }

                        if(data.length == 0)
                        {
                            $('#resultados').append('<li><a>No hay resultados</a></li>');
                        }
                        
                    })
                    .fail(function(xhr, status, error) {
                        console.log(xhr.responseText);
                    });
                    
                }
                else
                {
                    $('.results').hide();
                }

            })

        })
    </script>
@endpush