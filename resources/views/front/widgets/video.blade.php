
<?php $media = $media->first();?>
<section>

    <div class="container">
        <div class="row">

            <div class="big product_box_link">

                {!! !empty($media->link) ? Embed::make($media->link)->parseUrl()->getIframe() : '' !!}
                
                <?php $media = $media->first(); ?>
                <div class="info">
                    <div class="full_block">
                        <p class="strong"><strong>{{ $media->title }}</strong></p>

                       {!! $media->description !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
    @if($widget->show_prods && count($productos))
        @include('front.widgets.productos', $productos);
    @endif
</section>