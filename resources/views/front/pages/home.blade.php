@extends('front.layouts.app')

@section('includes.admin.breadcrumbs')
	{{ Breadcrumbs::render('home') }}
@endsection

@section('content')

@if(!empty($slider))
    @include('front.widgets.slider', ['widget' => $slider, 'media' => $slider->getMediaSorted()])
@endif

@foreach($widgets as $widget)
	@if ($widget->type != 7)
	    <?php $template = 'front.widgets.'.\Config::get("widgets.types")
	    [$widget->type]['type'] ?>
	    <?php $productos = $widget->productos(); ?>
	    <?php $media = $widget->getMediaSorted(); ?>
	    @include($template, ['widget' => $widget,'media' => $media])
    @endif
@endforeach

@endsection
