@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fancybox-master/dist/jquery.fancybox.min.css') }}">
@endpush
<div class="product_links_bar">
    @foreach($media as $video)
        <div class="col-xs-12 col-sm-4">
        @if(!empty($video->source))
            <a href="{{ $video->linkUrl() }}"  data-fancybox data-caption="Caption for single image">
                <img src="{{ asset('storage/'.$video->source) }}" />
            </a>
        @else
            @if(!empty($video->link))
            <a href="{{ $video->linkUrl() }}">
                <img src="{!! LaravelVideoEmbed::getYoutubeThumbnail($video->linkUrl())  !!}" alt="{{ $video->title }}" />
            </a>
            @endif
        @endif
        <?php /*
        {!! !empty($video->link) ? LaravelVideoEmbed::parse($video->linkUrl(),[], [], ['type' => null, 'class' => 'iframe-class', 'data-html5-parameter' => true, 'width' => '100%', 'height' => '213' ]) : '' !!}
        */?>
        </div>
    @endforeach
</div>

@push('scripts')
<script src="{{ asset('assets/fancybox-master/dist/jquery.fancybox.min.js') }}"></script>
@endpush