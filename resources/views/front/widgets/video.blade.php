
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fancybox-master/dist/jquery.fancybox.min.css') }}">
@endpush

<?php $media = $widget->media->first();?>
<section>

    <div class="container">
        <div class="row">

            <div class="big product_box_link">
                
                @if(!empty($media->source))
                    <a href="{{ $media->linkUrl() }}" data-fancybox data-caption="Caption for single image">
                        <img src="{{ asset('storage/'.$media->source) }}" />
                    </a>
                @else
                    {!! !empty($video->link) ? LaravelVideoEmbed::parse($video->linkUrl(),[], [], ['type' => null, 'class' => 'iframe-class', 'data-html5-parameter' => true, 'width' => '100%', 'height' => '213' ]) : '' !!}
                @endif
                <?php /*
                <a href="#">
                    {!! !empty($media->link) ? LaravelVideoEmbed::parse($media->linkUrl(),[], [], ['type' => null, 'class' => 'iframe-class', 'data-html5-parameter' => true, 'width' => '100%', 'height' => '636' ]) : '' !!}
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
        @include('front.widgets.productos', $productos)
    @endif
</section>


@push('scripts')
<script src="{{ asset('assets/fancybox-master/dist/jquery.fancybox.min.js') }}"></script>
@endpush