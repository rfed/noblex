@extends('front.layouts.app')

@section('includes.admin.breadcrumbs')
	{{ Breadcrumbs::render('home') }}
@endsection

@section('content')

@if(!empty($slider))
    @include('front.widgets.slider', ['widget' => $slider, 'media' => $slider->getMediaSorted()])
@endif

<?php $show_promoboxes = TRUE; ?>

@foreach($widgets as $widget)
	@if ($widget->type != 7)

		@if ($widget->type == 5)
			@if ($show_promoboxes)
				@include('front.widgets.promoboxes', ['promoboxes' => $promoboxes])
				<?php $show_promoboxes = FALSE; ?>
			@endif
		@else
	    	<?php $template = 'front.widgets.'.\Config::get("widgets.types")
	    	[$widget->type]['type'] ?>
	    	<?php $productos = $widget->productos(); ?>
	    	<?php $media = $widget->getMediaSorted(); ?>
	    	@include($template, ['widget' => $widget,'media' => $media])
	    @endif

    @endif
@endforeach

@endsection
