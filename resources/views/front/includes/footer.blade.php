<footer>
    <div class="fixed_tools">
        <a href="#" class="scroll_top">
            <span class="fa fa-angle-up"></span>
            <span class="sr-only">volver arriba</span>
        </a>

        <a href="#" class="btn_chat">
            <span class="fa fa-comment-dots"></span>
            <span class="sr-only">Chat online</span>
        </a>
    </div>

    <div class="container">

        <div class="copyright">
            <div>
                <a href="#">
                    <img src="assets/imgs/iconos/noblex.svg" alt="Noblex" />
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
                    <a href="#"><strong>Productos</strong></a>
                    <ul>
                        <li>
                            <a href="#">Smartwatch</a>
                        </li>
                        <li>
                            <a href="#">Productos AFA</a>
                        </li>
                        <li>
                            <a href="#">Action Cam</a>
                        </li>
                        <li>
                            <a href="#">Telefonía</a>
                        </li>
                        <li>
                            <a href="#">TV</a>
                        </li>
                        <li>
                            <a href="#">Computación</a>
                        </li>
                        <li>
                            <a href="#">Tablet</a>
                        </li>
                        <li>
                            <a href="#">Audio</a>
                        </li>
                        <li>
                            <a href="#">Aire Acondicionado</a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="column col-xs-6 col-sm-4">
                <div class="links">
                    <a href="#"><strong>Soporte</strong></a>

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
                    <a href="#">
                        <span>Chat online</span>
                        <span class="fa fa-comment-dots"></span>
                    </a>
                </div>
            </div>


            <div class="column newsletter col-xs-12 col-sm-5">

                <p><strong>Newsletter <span class="fa fa-envelope-open"></span></strong></p>
                <span>Suscribite y enterate de los lanzamiento y las últimas novedades.</span>

                <form>
                    <div>
                        <input type="text" placeholder="Nombre" />
                    </div>
                    <div>
                        <input type="text" placeholder="Correo electrónico" />
                    </div>
                    <div class="submit_block">
                        <!-- CAPTCHA V2: CAMBIAR LA data-sitekey -->
                        <div class="g-recaptcha" data-sitekey="6LflNj0UAAAAAANcGQiFKTufw6BtjghDFRYblqO0"></div>

                        <input type="submit" class="btn link" value="Enviar" />
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
                    <img src="assets/imgs/iconos/newsan.png" alt="Newsan" />
                </a>
            </div>

            <div>
                <a href="https://www.id4you.com.ar" target="_blank">
                    <img src="assets/imgs/iconos/id4you.svg" alt="Diseño y desarrollo WEB by ID4YOU" />
                </a>
            </div>

        </div>

    </div>
</footer>


<script src="{{ asset('assets/jquery/jquery-1.12.3.min.js') }}"></script>
<script src="{{ asset('assets/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script src="{{ asset('assets/js/css3-mediaqueries.js') }}"></script>
<script src="{{ asset('assets/js/html5shiv.js') }}"></script>
<script src="{{ asset('assets/js/respond.js') }}"></script>
@stack('scripts')