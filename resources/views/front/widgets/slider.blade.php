<section>
    
    <div class="container">
        
        <div class="row">

            <div class="carousel_product_box_link owl-carousel dots">
                @foreach($widget->media as $media)
                <!-- -->
                <div class="item product_box_link">
                    <div class="image">
                        <a href="{{ $media->link }}">
                            <img src="{{ asset('storage/' . $media->source) }}" alt="Móviles" />
                        </a>
                    </div>

                    <div class="info">
                        <div class="half_block">
                            <p class="strong"><strong>{{ $media->title }}</strong></p>
                        </div>

                        <div class="half_block">
                            <p>{{ $media->description }}</p>
                        </div>

                        <div class="link_block">
                            <a href="{{ $media->link }}" class="btn link">Ver todos</a>
                        </div>
                    </div>
                </div>
                <!-- -->
                @endforeach
            </div>

        </div>
    </div>
</section>