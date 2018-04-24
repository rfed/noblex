
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->

    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->

        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">


            <li class="nav-item start {{ activeMenu('panel/home') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <!--
                <ul class="sub-menu">
                    <li class="nav-item start active open">
                        <a href="#" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Dashboard 1</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
                -->
            </li>

            <li class="nav-item start {{ activeMenu('panel/marcas*') }}">
                <a href="{{ route('admin.brands.index') }}" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">Marcas</span>
                </a>
            </li>
            <li class="nav-item start {{ activeMenu('panel/inicio') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Pagina inicial</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ activeMenu('panel/slider*') }}">
                        <a href="{{ route('admin.slider.index') }}" class="nav-link nav-toggle">
                            <i class="icon-list"></i>
                            <span class="title">Slider</span>
                        </a>
                    </li>
                    <li class="nav-item start {{ activeMenu('panel/widgets*') }}">
                        <a href="{{ route('admin.widgets.index') }}" class="nav-link nav-toggle">
                            <i class="icon-list"></i>
                            <span class="title">Widgets</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item start {{ activeMenu('panel/config') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Configuracion</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ activeMenu('panel/features*') }}">
                        <a href="{{ route('admin.features.index') }}" class="nav-link nav-toggle">
                            <i class="icon-list"></i>
                            <span class="title">Features</span>
                        </a>
                    </li>
                    <li class="nav-item start {{ activeMenu('panel/attribute*') }}">
                        <a href="{{ route('admin.attributes.index') }}" class="nav-link nav-toggle">
                            <i class="icon-list"></i>
                            <span class="title">Atributos</span>
                        </a>
                    </li>
                    <li class="nav-item start {{ activeMenu('panel/groups*') }}">
                        <a href="{{ route('admin.groups.index') }}" class="nav-link nav-toggle">
                            <i class="icon-list"></i>
                            <span class="title">Grupos de Atributos</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item start {{ activeMenu('panel/categorias*') }}">
                <a href="{{ route('admin.categorias.index') }}" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">Categorias</span>
                </a>
            </li>
            <li class="nav-item start {{ activeMenu('panel/productos*') }}">
                <a href="{{ route('admin.productos.index') }}" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">Productos</span>
                </a>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>