<section>
    
    <div class="container">
        
        <div class="row">
   
            <div class="carousel_product_box_link owl-carousel dots">
                @foreach($media as $med)
                @if(@$med->source and @$med->source != '')
                    <!-- -->
                    <div class="item product_box_link">
                        
                        <div class="image">
                            <a target="{{ $med->linkTarget() }}" href="{{ $med->linkUrl() }}">
                                <img src="{{ asset('storage/' . $med->source) }}" alt="Móviles" />
                            </a>
                        </div>

                        <div class="info">

                            <div class="half_block">
                                <p class="strong"><strong>{{ $med->title }}</strong></p>
                            </div>

                            <div class="half_block">
                                <p>{!! $med->description !!}</p>
                            </div>

                            <div class="link_block">
                                <a target="{{ $med->linkTarget() }}" href="{{ $med->linkUrl() }}" class="btn link">Ver todos</a>
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