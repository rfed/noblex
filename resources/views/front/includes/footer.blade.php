<footer>
    <div class="fixed_tools">
        <a href="#" class="scroll_top">
            <span class="fa fa-angle-up"></span>
            <span class="sr-only">volver arriba</span>
        </a>

        <!--
        <a href="#" class="btn_chat">
            <span class="fa fa-comment-dots"></span>
            <span class="sr-only">Chat online</span>
        </a>
        -->
    </div>

    <div class="container">

        <div class="copyright">
            <div>
                <a href="#">
                    <img src="/assets/imgs/iconos/noblex.svg" alt="Noblex" />
                </a>

                <small>2018 Copyright Noblex, todos los derechos reservados - <a href="#">Políticas de Privacidad</a></small>
            </div>

            <div class="networks_list hidden-xs hidden-sm">
                <ul>
                    <li>
                        <a href="#">
                            <span class="fab fa-facebook"></span>
                            <span class="sr-only">Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fab fa-twitter"></span>
                            <span class="sr-only">twitter</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fab fa-instagram"></span>
                            <span class="sr-only">Instagram</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fab fa-youtube"></span>
                            <span class="sr-only">YouTube</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="access_list clearfix">
            <div class="column col-xs-6 col-sm-3">
                <div class="links">
                    <a href="{{ url('') }}"><strong>Productos</strong></a>
                    <ul>
                        @foreach($menu_raiz->getChildsOrdered() as $cat)
                            @if($cat->visible)
                            <li>
                                <a href="{{ url($cat->url) }}">{{ $cat->name }}</a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>


            <div class="column col-xs-6 col-sm-4">
                <div class="links">
                    <a href="#" class="triggerChat"><strong>Atención al cliente</strong></a>

                    <ul>
                        <li>
                            <a href="#">Centro de Descarga</a>
                        </li>
                    </ul>
                </div>

                <div class="links">
                    <a href="#"><strong>Mas información</strong></a>

                    <ul>
                        <li>
                            <a href="#">Acerca de Noblex</a>
                        </li>
                        <li>
                            <a href="#">Contacto</a>
                        </li>
                        <li>
                            <a href="#">Ventas Corporativas</a>
                        </li>
                        <li>
                            <a href="#">Legales</a>
                        </li>
                    </ul>
                </div>

                <div class="links chat">
                    <a href="#" class="triggerChat">
                        <span>Chat online</span>
                        <span class="fa fa-comment-dots"></span>
                    </a>
                </div>
            </div>


            <div class="column newsletter col-xs-12 col-sm-5" id="newsletter">

                <p><strong>Newsletter <span class="fa fa-envelope-open"></span></strong></p>
                <span>Suscribite y enterate de los lanzamiento y las últimas novedades.</span>
                
                {!! Session::has('success') ? '<p class="exito">'.Session::get('success').'</p>' : '' !!}

                <form action="{{ route('newsletter.store') }}" method="POST" id="formNewsletter">
                    @csrf

                    <div>
                        <input type="text" name="name" id="name" placeholder="Nombre"  autocomplete="off" value="{{ old('name') }}" />
                        {!! $errors->first('name', '<span style="color:red"> :message </span>') !!}
                    </div>

                    <div>
                        <input type="email" name="email" id="email" placeholder="Correo electrónico" autocomplete="off" value="{{ old('email') }}"  />
                        {!! $errors->first('email', '<span style="color:red"> :message </span>') !!}
                    </div>
                    
                    {!! $errors->first('g-recaptcha-response') ? '<span style="color:red">El Captcha es requerido</span>' : '' !!}

                    <div class="submit_block">

                        <!-- https://github.com/anhskohbo/no-captcha -->
                        {!! NoCaptcha::display() !!}

                        <input type="submit" id="submit" class="btn link" value="Enviar" />
                    </div>

                </form>

            </div>

            <div class="networks_list col-xs-12 hidden-md hidden-lg">
                <p><strong>Seguinos</strong></p>
                <ul>
                    <li>
                        <a href="#">
                            <span class="fab fa-facebook"></span>
                            <span class="sr-only">Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fab fa-twitter"></span>
                            <span class="sr-only">twitter</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fab fa-instagram"></span>
                            <span class="sr-only">Instagram</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fab fa-youtube"></span>
                            <span class="sr-only">YouTube</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>


        <div class="zocalo">

            <div>
                <a href="http://www.newsan.com.ar/es/home/" target="_blank">
                    <img src="/assets/imgs/iconos/newsan.png" alt="Newsan" />
                </a>
            </div>

            <div>
                <a href="https://www.id4you.com.ar" target="_blank">
                    <img src="/assets/imgs/iconos/id4you.svg" alt="Diseño y desarrollo WEB by ID4YOU" />
                </a>
            </div>

        </div>

    </div>
</footer>


<script src="{{ asset('assets/jquery/jquery-1.12.3.min.js') }}"></script>
<script src="{{ asset('assets/selectric/jquery.selectric.js') }}"></script>
<script src="{{ asset('assets/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script src="{{ asset('assets/js/css3-mediaqueries.js') }}"></script>
<script src="{{ asset('assets/js/html5shiv.js') }}"></script>
<script src="{{ asset('assets/js/respond.js') }}"></script>
<script src="{{ asset('pages/newsletter/js/app.js') }}"></script>
@stack('scripts')