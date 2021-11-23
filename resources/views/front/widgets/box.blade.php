<section class="divider promobox">
    <div class="container">
        <div class="row">
            <div class="item col-xs-6">
                <a target="{{ $media[0]->link_target }}" href="{{ $media[0]->link }}" title="{{ $media[0]->title }}">
                    <img src="{{ asset('storage/'.$media[0]->source) }}" alt="{{ $media[0]->title }}" />
                </a>
            </div>
        </div>
    </div>
</section>