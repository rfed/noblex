@if ($slider->active)
<section>
    
    <div class="container">
        <div class="row">
   
            <div class="carousel_product_box_link owl-carousel dots">
                @foreach($media as $med)
                @if(@$med->source and @$med->source != '')
                    <!-- -->
                    <div class="item product_box_link">
                        
                        <div class="image">
                            <a target="{{ $med->link_target }}" href="{{ $med->link }}">
                                <img src="{{ asset('storage/' . $med->source) }}" alt="Móviles" />
                            </a>
                        </div>

                        <div class="info">
                            @if($med->title)
                            <div class="half_block">
                                <p class="strong"><strong>{{ $med->title }}</strong></p>
                                }
                            </div>
                            @endif
                            @if($med->description)
                            <div class="half_block">
                                <p>{!! $med->description !!}</p>
                            </div>
                            @endif
                            @if($med->link != "#")
                            <div class="link_block">
                                <a target="{{ $med->link_target }}" href="{{ $med->link }}" class="btn link">Ver todos</a>
                            </div>
                            @endif
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
@endif