@extends('front.layouts.app')

@section('includes.admin.breadcrumbs')
	{{ Breadcrumbs::render('home') }}
@endsection

@section('content')

@foreach($widgets as $widget)
    <?php $template = 'front.widgets.'.\Config::get("widgets.types")
    [$widget->type]['type'] ?>
    <?php $productos = $widget->productos(); ?>
    <?php $media = $widget->getMediaSorted(); ?>
    @include($template, ['widget' => $widget,'media' => $media])
@endforeach

@endsection
