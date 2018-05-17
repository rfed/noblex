<section class="divider">
    <div class="container">
        <?php $media = $widget->media->first();?>
        <a target="{{ $media->link_target }}" href="{{ $media->link }}">
            <img src="{{ asset('storage/'.$media->source) }}" alt="{{ $widget->title }}" />
        </a>

    </div>
    
    @if($widget->show_prods && count($productos))
        @include('front.widgets.productos', $productos);
    @endif
</section>