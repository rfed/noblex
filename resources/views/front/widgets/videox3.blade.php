<section class="divider">
    <div class="container">
        <div class="product_links_bar">
            @foreach($widget->media as $media)
            <div class="col-xs-12 col-sm-4">
                {!! !empty($media->link) ? LaravelVideoEmbed::parse($media->linkUrl(),[], [], ['type' => null, 'class' => 'iframe-class', 'data-html5-parameter' => true, 'width' => '100%', 'height' => '213' ]) : '' !!}
            </div>
            @endforeach
        </div>
    </div>
    @if($widget->show_prods && count($productos))
        @include('front.widgets.productos', $productos);
    @endif
</section>