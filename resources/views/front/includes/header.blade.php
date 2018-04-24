<div class="main_head">
    <div class="container">

        <div class="section_info">

            <!-- BREADCRUMB DESKTOP -->

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

            <!-- FIN BREADCRUMB DESKTOP -->


            @yield('hotlinks')
            
        </div>

        <div class="section_tools">
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

<!-- FIN BREADCRUMB MOBILE -->