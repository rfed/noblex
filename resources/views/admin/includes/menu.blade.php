
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
            </li>

            @if (\Auth::user()->admin)
            <li class="nav-item start {{ activeMenu('panel/marcas*') }}">
                <a href="{{ route('admin.brands.index') }}" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">Marcas</span>
                </a>
            </li>
            <li class="nav-item start {{ activeMenu('panel/users*') }}">
                <a href="{{ route('admin.users.index') }}" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">Usuarios</span>
                </a>
            </li>
            @endif

            <li class="nav-item start {{ activeMenu('panel/slider*') ? activeMenu('panel/slider*') : (activeMenu('panel/widgets*') ? activeMenu('panel/widgets*') : '') }}">
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
            <li class="nav-item start {{ activeMenu('panel/features*') ? activeMenu('panel/features*') : (activeMenu('panel/attribute*') ? activeMenu('panel/attribute*') : (activeMenu('panel/groups*') ? activeMenu('panel/groups*') : activeMenu('panel/subjects*')))  }}">
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
                    <li class="nav-item start {{ activeMenu('panel/subjects*') }}">
                        <a href="{{ route('admin.subjects.index') }}" class="nav-link nav-toggle">
                            <i class="icon-list"></i>
                            <span class="title">Asuntos</span>
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
            <li class="nav-item start {{ activeMenu('panel/newsletter*') }}">
                <a href="{{ route('admin.newsletter.index') }}" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">Newsletter</span>
                </a>
            </li>
            <li class="nav-item start {{ activeMenu('panel/stories') ? activeMenu('panel/stories') : (activeMenu('panel/tags') ? activeMenu('panel/tags') : (activeMenu('panel/themes*') ? activeMenu('panel/themes*') : '')) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Novedades</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start {{ activeMenu('panel/stories*') }}">
                        <a href="{{ route('admin.stories.index') }}" class="nav-link nav-toggle">
                            <i class="icon-list"></i>
                            <span class="title">Novedades</span>
                        </a>
                    </li>
                    <li class="nav-item start {{ activeMenu('panel/tags*') }}">
                        <a href="{{ route('admin.tags.index') }}" class="nav-link nav-toggle">
                            <i class="icon-list"></i>
                            <span class="title">Etiquetas</span>
                        </a>
                    </li>
                    <li class="nav-item start {{ activeMenu('panel/themes*') }}">
                        <a href="{{ route('admin.themes.index') }}" class="nav-link nav-toggle">
                            <i class="icon-list"></i>
                            <span class="title">Categor??as</span>
                        </a>
                    </li>
                </ul>
            </li>            
            <li class="nav-item start {{ activeMenu('panel/pages*') }}">
                <a href="{{ route('admin.pages.index') }}" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">P??ginas de Contenido</span>
                </a>
            </li>
            <li class="nav-item start {{ activeMenu('panel/contactos*') }}">
                <a href="{{ route('admin.contactos.index') }}" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">Contactos</span>
                </a>
            </li>
            <li class="nav-item start {{ activeMenu('panel/customers*') }}">
                <a href="{{ route('admin.customers.index') }}" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">Clientes</span>
                </a>
            </li>            
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>