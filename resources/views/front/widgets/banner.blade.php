<section class="divider">
    <div class="container">

        <a href="{{ $widget->url }}">
            <img src="{{ asset('storage/'.$widget->media->first()->source) }}" alt="{{ $widget->title }}" />
        </a>

    </div>
</section>