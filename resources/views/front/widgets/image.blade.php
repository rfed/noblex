<?php 
    
    $media = $media->where('type', 'image')->first();
    
    $videos = $widget->media->where('type', 'video')->sortBy('position');

?>
@if($media and $media->source)
<section class="divider">
    
    <div class="container">
        <div class="row">

            <div class="item product_box_link">
                
                @if($media->source && $media->source != '')
                <div class="image">
                    <a target="{{ $media->linkTarget() }}" href="{{ $media->linkUrl() }}" title="{{ $media->title }}">
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
                    
                        @if($media->description && $media->description != '')
                            <div>
                                <p>{!! $media->description !!}</p>
                            </div>
                        @endif
                        
                        <!--
                        <div>
                            <div class="features">
                                <img src="{{ asset('assets/imgs/iconos/ultra_hd.png') }}" alt="Ultra HD" />
                                <img src="{{ asset('assets/imgs/iconos/sound.png') }}" alt="" />
                                <img src="{{ asset('assets/imgs/iconos/xmotion.png') }}" alt="Xmotion" />
                                <img src="{{ asset('assets/imgs/iconos/smart.png') }}" alt="Smart" />
                                <img src="{{ asset('assets/imgs/iconos/youtube.png') }}" alt="YouTube" />
                                <img src="{{ asset('assets/imgs/iconos/netflix.png') }}" alt="Netflix" />
                            </div>
                        </div>
                        -->
                    </div>
                    @endif



                    @if($media->link && $media->link != '')
                    <div class="link_block">
                        <a href="{{ $media->link }}" class="btn link">Ver Todos</a>
                    </div>
                    @endif
                </div>
            </div>

        </div>
        @if(!empty($videos))
            @include('front.widgets.videox3', ['media' => $videos]);
        @endif

        @if($widget->show_prods && count($productos))
            @include('front.widgets.productos', $productos);
        @endif
    </div>
    
</section>
@endif