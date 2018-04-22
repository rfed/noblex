<section class="divider">
    <div class="container">
        <div class="row">

            <div class="item product_box_link">
                
                <div class="image">
                    <a href="{{ $widget->url ? $widget->url : '#' }}">
                        <img src="{{ asset('storage/' . $widget->media->first()->source) }}" />
                    </a>
                </div>

                <div class="info">

                    <div class="half_block">
                        <p class="strong"><strong>{{ $widget->title }}</strong></p>
                    </div>


                    @if(!$widget->feautures)
                    <div class="half_block">
                        <p>{!! $widget->description !!}</p>
                    </div>
                    @else
                    <div class="full_block no_padding">
                        <div>
                            <p>Experimentá la emoción de ver imágenes en la mejor definición y resolución. Accedé a lo mejor de Internet.</p>
                        </div>
                        <div>
                            <div class="features">
                                <img src="assets/imgs/iconos/ultra_hd.png" alt="Ultra HD" />
                                <img src="assets/imgs/iconos/sound.png" alt="" />
                                <img src="assets/imgs/iconos/xmotion.png" alt="Xmotion" />
                                <img src="assets/imgs/iconos/smart.png" alt="Smart" />
                                <img src="assets/imgs/iconos/youtube.png" alt="YouTube" />
                                <img src="assets/imgs/iconos/netflix.png" alt="Netflix" />
                            </div>
                        </div>
                    </div>
                    @endif



                    @if($widget->btn_text && $widget->btn_text != '')
                    <div class="link_block">
                        <a href="{{ $widget->url }}" class="btn link">{{ $widget->btn_text }}</a>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>