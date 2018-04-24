@extends('front.layouts.app')

@section('includes.admin.breadcrumbs')
	{{ Breadcrumbs::render('home') }}
@endsection

@section('content')

@if(!empty($slider))

    @include('front.widgets.slider', ['widget' => $slider, 'media' => $slider->getMediaSorted()])
@endif

@foreach($widgets as $widget)
    <?php $template = 'front.widgets.'.\Config::get("widgets.types")
    [$widget->type]['type'] ?>
    <?php $productos = $widget->productos(); ?>
    <?php $media = $widget->getMediaSorted(); ?>
    @include($template, ['widget' => $widget,'media' => $media])
@endforeach

@endsection
