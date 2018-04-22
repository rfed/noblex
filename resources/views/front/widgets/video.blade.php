<section>
    <div class="container">
        <div class="row">

            <div class="big product_box_link">
                <video width="100%" controls>
                    <source src="{{ asset('storage/'.$widget->media->first()->source) }}" type="video/mp4"/>
                </video>
                

                <div class="info">
                    <div class="full_block">
                        <p class="strong"><strong>{{ $widget->title }}</strong></p>

                       {!! $widget->description !!}
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>