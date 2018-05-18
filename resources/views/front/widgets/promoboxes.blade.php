<section class="divider promobox">
    <div class="container">
        <div class="row">
            @if (count($promoboxes)>1)
                
                <?php 
                $promobox = $promoboxes[0];
                $media = $promobox->media[0]; 
                ?>
                <div class="item col-xs-6">
                    <a target="{{ $media->link_target }}" href="{{ $media->link }}" title="{{ $media->title }}">
                        <img src="{{ asset('storage/'.$media->source) }}" alt="{{ $media->title }}" />
                    </a>
                </div>

                <?php 
                $promobox = $promoboxes[1];
                $media = $promobox->media[0]; 
                ?>
                <div class="item col-xs-6">
                    <a target="{{ $media->link_target }}" href="{{ $media->link }}" title="{{ $media->title }}">
                        <img src="{{ asset('storage/'.$media->source) }}" alt="{{ $media->title }}" />
                    </a>
                </div>

            @endif

            @if (count($promoboxes)>3)
                <?php 
                $promobox = $promoboxes[2];
                $media = $promobox->media[0]; 
                ?>
                <div class="item col-xs-6">
                    <a target="{{ $media->link_target }}" href="{{ $media->link }}" title="{{ $media->title }}">
                        <img src="{{ asset('storage/'.$media->source) }}" alt="{{ $media->title }}" />
                    </a>
                </div>

                <?php 
                $promobox = $promoboxes[3];
                $media = $promobox->media[0]; 
                ?>
                <div class="item col-xs-6">
                    <a target="{{ $media->link_target }}" href="{{ $media->link }}" title="{{ $media->title }}">
                        <img src="{{ asset('storage/'.$media->source) }}" alt="{{ $media->title }}" />
                    </a>
                </div>

            @endif            
        </div>
    </div>
</section>