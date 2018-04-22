<section class="divider">
    <div class="container">
        <div class="product_links_bar">
            @foreach($widget->media as $media)
            <div class="col-xs-12 col-sm-4">
                <video width="100%" controls>
                    <source src="{{ asset('storage/'.$media->source) }}" type="video/mp4"   >
                </video>
            </div>
            @endforeach
        </div>
    </div>
</section>