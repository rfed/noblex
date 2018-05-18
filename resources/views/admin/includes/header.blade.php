
<div class="page-header navbar navbar-fixed-top">

    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{ route('admin.home') }}">
                <img src="{{ asset('assets/imgs/iconos/noblex_blanco.png') }}" alt="logo" class="logo-default img-responsive" />
            </a>

            <div class="menu-toggler sidebar-toggler hidden">
                <span></span>
            </div>

        </div>
        <!-- END LOGO -->

        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->

        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                @guest
                    <li><a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }}</a></li>
                @else
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile"> {{ ucwords(Auth::user()->name) }} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-default">
                            <!--
                            <li>
                                <a href="#">
                                    <i class="icon-user"></i> Perfil 
                                </a>
                            </li>
                            <li class="divider"> </li>
                            -->
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                   onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i class="icon-key"></i> Salir
                                </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->

</div>

<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER -->