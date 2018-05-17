<?php 
    
    $media = $media->where('type', 'image')->first();
    
    $videos = $widget->media->where('type', 'video')->sortBy('position');

    if ($widget->category) {
        $features = $widget->category->features;
    }
    else {
        $features = FALSE;
    }

?>
@if($media and $media->source)
<section class="divider">
    
    <div class="container">
        <div class="row">

            <div class="item product_box_link">
                
                @if($media->source && $media->source != '')
                <div class="image">
                    <a target="{{ $media->link_target }}" href="{{ $media->link }}" title="{{ $media->title }}">
                        <img src="{{ asset('storage/' . $media->source) }}" />
                    </a>
                </div>
                @endif
                
                <div class="info">
                
                    @if($media->title && $media->title != '')
                    <div class="half_block">
                        <p class="strong"><strong>{!! $media->title !!}</strong></p>
                    </div>
                    @endif
                    
                    @if(!$widget->features)
                        @if($media->description && $media->description != '')
                        <div class="half_block">
                            <p>{!! $media->description !!}</p>
                        </div>
                        @endif
                        
                    @else

                    <div class="full_block no_padding">
                    
                        @if($media->subtitle && $media->subtitle != '')
                            <div>
                                <p>{!! $media->subtitle !!}</p>
                            </div>
                        @endif
                        
                        @if ($features)
                        <div>
                            <div class="features">
                                @foreach ($features as $feature)
                                <img src="{{ asset('storage/'.$feature->image) }}" alt="{{ $feature->name }}" />
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif



                    @if($media->link && $media->link != '')
                    <div class="link_block">
                        <a href="{{ $media->link }}" target="{{ $media->link_target }}" class="btn link">Ver Todos</a>
                    </div>
                    @endif
                </div>
            </div>

        </div>
        @if(!empty($videos))
            @include('front.widgets.videox3', ['media' => $videos])
        @endif

        @if($widget->show_prods && count($productos))
            @include('front.widgets.productos', $productos)
        @endif
    </div>
    
</section>
@endif