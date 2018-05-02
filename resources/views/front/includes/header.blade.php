<div class="main_head">
    <div class="container">

        <div class="section_info">

            <!-- BREADCRUMB DESKTOP -->
            @isset($breadcrumbs)
            <div class="breadcrumb">
                <p>
                    @foreach ($breadcrumbs as $breadcrumb)
                    @if ($loop->last)
                    <span>{{ $breadcrumb['caption'] }}</span>
                    @else
                    <a href="{{ url($breadcrumb['link']) }}">{{ $breadcrumb['caption'] }}</a> > 
                    @endif
                    @endforeach
                </p>
            </div>
            @endisset

            <!-- FIN BREADCRUMB DESKTOP -->


            @yield('hotlinks')
            
        </div>

        <div class="section_tools">
            <a href="#">
                <span class="fa fa-file-alt"></span>
                <span>Manuales</span>
            </a>

            <a href="#" class="triggerChat">
                <span class="fa fa-wrench"></span>
                <span>Atención al cliente</span>
            </a>
            <!--
            <a href="#" class="compare_btn">
                <span class="fas fa-external-link-alt"></span>
                <span>Comparar seleccionados</span>
            </a>
            -->
        </div>

    </div>
</div>

<!-- BREADCRUMB MOBILE -->

@isset($breadcrumbs)
<div class="section_info mobile container">
    <div class="breadcrumb">
        <p>
            @foreach ($breadcrumbs as $breadcrumb)
            @if ($loop->last)
            <span>{{ $breadcrumb['caption'] }}</span>
            @else
            <a href="{{ url($breadcrumb['link']) }}">{{ $breadcrumb['caption'] }}</a> > 
            @endif
            @endforeach
        </p>
    </div>
</div>
@endisset

<!-- FIN BREADCRUMB MOBILE -->