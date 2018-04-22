<section class="divider promobox">
    <div class="container">
        <div class="row">
            @foreach($widget->media as $media)
            <div class="item col-xs-6">
                <a href="{{ $media->link }}" title="{{ $media->title }}">
                    <img src="{{ asset('storage/'.$media->source) }}" alt="{{ $media->title }}" />
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @if($widget->show_prods && count($productos))
        @include('front.widgets.productos', $productos);
    @endif
</section>