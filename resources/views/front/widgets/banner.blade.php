<section class="divider">
    <div class="container">

        <a href="{{ $widget->url }}">
            <img src="{{ asset('storage/'.$widget->media->first()->source) }}" alt="{{ $widget->title }}" />
        </a>

    </div>

    @if($widget->show_prods && count($productos))
        @include('front.widgets.productos', $productos);
    @endif
</section>