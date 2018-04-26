<div class="padding_bottom product_list_carousel owl-carousel">

    @foreach($productos as $producto)
    <div class="item">
        <a href="{{ url($producto->category->parent->url.'/'.$producto->category->url.'/'.$producto->sku) }}">
            <div class="image">
                <img src="{{ asset('storage/'.($producto->thumb ? $producto->thumb->source : 'no-foto.png')) }}" alt='{{ $producto->name }}' />

                @if ($producto->tag)
                <span class="feature"><span>{{ $producto->tag }}</span></span>
                @endif
            </div>
            <span class="id">{{ $producto->sku }}</span>
            <p class="title"><strong>{{ $producto->name }}</strong></p>
            <span class="description">{{ str_limit($producto->description, $limit = 100 , $end = '...') }}</span>
        </a>

        <center>
            <button class="btn link" data-etailingcode="{{ $producto->sku }}" data-etailingname="{{ $producto->sku }}" data-etailingcat="{{ $producto->category->name }}" onclick="etailing_btn_comprar(this);" class="btn link staggered-animation btn-responsive" data-os-animation-delay="1s">Comprar</button>
        </center>
    </div>
    @endforeach

</div>