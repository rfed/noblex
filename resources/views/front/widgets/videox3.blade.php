<div class="product_links_bar">
    @foreach($media as $video)
    <div class="col-xs-12 col-sm-4">
        {!! !empty($video->link) ? LaravelVideoEmbed::parse($video->linkUrl(),[], [], ['type' => null, 'class' => 'iframe-class', 'data-html5-parameter' => true, 'width' => '100%', 'height' => '213' ]) : '' !!}
    </div>
    @endforeach
</div>