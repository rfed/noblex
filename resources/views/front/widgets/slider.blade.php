<section>
    
    <div class="container">
        
        <div class="row">

            <div class="carousel_product_box_link owl-carousel dots">
                @foreach($widget->media as $media)

                    @if($media->source and $media->source != '')
                    <!-- -->
                    <div class="item product_box_link">
                        <div class="image">
                            <a target="{{ $media->linkTarget() }}" href="{{ $media->linkUrl() }}">
                                <img src="{{ asset('storage/' . $media->source) }}" alt="Móviles" />
                            </a>
                        </div>

                        <div class="info">
                            <div class="half_block">
                                <p class="strong"><strong>{{ $media->title }}</strong></p>
                            </div>

                            <div class="half_block">
                                <p>{!! $media->description !!}</p>
                            </div>

                            <div class="link_block">
                                <a target="{{ $media->linkTarget() }}" href="{{ $media->linkUrl() }}" class="btn link">Ver todos</a>
                            </div>
                        </div>
                    </div>
                    <!-- -->
                    @endif
                @endforeach
            </div>

        </div>
    </div>
    @if($widget->show_prods && count($productos))
        @include('front.widgets.productos', $productos);
    @endif
</section>