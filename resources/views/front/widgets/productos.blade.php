<div class="padding_bottom product_list_carousel owl-carousel">

    <!-- -->

    @foreach($productos as $producto)

    <div class="item">
        <a href="#">
            <div class="image">
                <img src="{{ asset('storage/'.$producto->featuredImg->source) }}" alt='{{ $producto->name }}' />

                <span class="feature"><span>65"</span></span>
            </div>
            <span class="id">{{ $producto->name }}</span>
            <p class="title"><strong>{{ $producto->short_description }}</strong></p>
            <span class="description">{{ str_limit($producto->description, $limit = 100 , $end = '...') }}</span>

            <button class="btn link">Comprar</button>
        </a>
    </div>
    @endforeach

    <!-- -->

</div>