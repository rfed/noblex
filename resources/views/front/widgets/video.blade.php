
<?php $media = $widget->media->first();?>
<section>

    <div class="container">
        <div class="row">

            <div class="big product_box_link">
                
                {!! !empty($media->link) ? LaravelVideoEmbed::parse($media->linkUrl(),[], [], ['type' => null, 'class' => 'iframe-class', 'data-html5-parameter' => true, 'width' => '100%', 'height' => '636' ]) : '' !!}
                <?php /*
                <a href="#">
                    <img src="{!! LaravelVideoEmbed::getYoutubeThumbnail($media->linkUrl())  !!}" alt="{{ $media->title }}" />
                </a>
                */ ?>
                        
                <div class="info">
                    <div class="full_block">
                        <p class="strong"><strong>{{ $media->title }}</strong></p>

                        <p>{{ $media->subtitle }}</p>

                       <span>{{ $media->description }}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @if($widget->show_prods && count($productos))
        @include('front.widgets.productos', $productos);
    @endif
</section>