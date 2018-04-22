@extends('front.layouts.app')

@section('includes.admin.breadcrumbs')
	{{ Breadcrumbs::render('home') }}
@endsection

@section('content')

@foreach($widgets as $widget)
    <?php $template = 'front.widgets.'.\Config::get("widgets.types")[$widget->type]['type'] ?>
    <?php $productos = $widget->productos(); ?>
    @include($template, $widget)
@endforeach

@endsection
