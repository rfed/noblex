<section class="divider promobox">
    <div class="container">
        <div class="row">
            @foreach($widget->media as $media)
            <div class="item col-xs-6">
                <a href="{{ $media->link }}">
                    <img src="{{ asset('storage/'.$media->source) }}" alt="{{ $media->title }}" />
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>