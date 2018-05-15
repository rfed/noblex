@extends('front.layouts.app')

@section('includes.admin.breadcrumbs')
	{{ Breadcrumbs::render('home') }}
@endsection

@section('content')

<div class="content container">

	<h1 class="section_title">{{ $page->title }}</h1>

	{!! $page->content !!}

</div>

@push('scripts')
	<script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('pages/descargas/js/main.js') }}"></script>
@endpush

@endsection