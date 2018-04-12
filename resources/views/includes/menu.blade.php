
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->

    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->

        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">

            <li class="nav-item start {{ activeMenu('home') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>

                <ul class="sub-menu">
                    <li class="nav-item start active open">
                        <a href="#" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Dashboard 1</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item start {{ activeMenu('categorias*') }}">
                <a href="{{ route('categorias.index') }}" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">Categorias</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>