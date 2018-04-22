@extends('front.layouts.app')

@section('includes.admin.breadcrumbs')
	{{ Breadcrumbs::render('home') }}
@endsection

@section('content')

@foreach($widgets as $widget)
    <?php $template = 'front.widgets.'.\Config::get("widgets.types")[$widget->type]['type'] ?>
    @include($template, $widget)
    <?php $productos = $widget->productos(); ?>
    @if($widget->show_prods && count($productos))
        @include('front.widgets.productos', $productos);
    @endif
@endforeach

@endsection
