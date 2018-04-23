<section>
    <div class="container">
        <div class="row">

            <div class="big product_box_link">
                <video width="100%" controls>
                    <source src="{{ asset('storage/'.$widget->media->first()->source) }}" type="video/mp4"/>
                </video>
                

                <div class="info">
                    <div class="full_block">
                        <p class="strong"><strong>{{ $widget->media->first()->title }}</strong></p>

                       {!! $widget->media->first()->description !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
    @if($widget->show_prods && count($productos))
        @include('front.widgets.productos', $productos);
    @endif
</section>