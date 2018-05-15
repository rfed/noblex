@extends('front.layouts.app')

@section('includes.admin.breadcrumbs')
	{{ Breadcrumbs::render('home') }}
@endsection

@section('content')

<div class="container">

	@if (count($products) <= 1)
	<div class="cartel">Por favor seleccione al menos dos productos para poder compararlos.</div>
	@else
	<div class="table_content">

		<table>
			<tr>
				<th class="title">{{ $category->name }}</th>
				@foreach ($products as $product)
				<th>
					<a href="#" class="remove_item" data-item="{{ $product->id }}">
						<span class="sr-only">Eliminar</span>
						<span>X<span>
					</a>
				</th>
				@endforeach
			</tr>
			<tr>
				<th></th>
				@foreach ($products as $product)
				<th>
					<div class="product">
						<img src="{{ asset('storage/'.($product->thumb ? $product->thumb->source : 'no-foto.png')) }}" alt="{{ $product->name }}"" />
						<p class="title">{{ $product->title }}</p>
						<span class="id">{{ $product->sku }}</span>

						@if ($product->tag)
						<span class="feature">
							<span>{{ $product->tag }}</span>
						</span>
						@endif
					</div>
				</th>
				@endforeach
			</tr>
			@foreach ($groups as $group=>$attributes)
			<tr>
				<th class="title">{{ $group }}</th>
				@foreach ($products as $product)
				<th></th>
				@endforeach
			</tr>
			@foreach ($attributes as $attribute)
			<tr>
				<td>{{ $attribute }}</td>
				@foreach ($products as $product)
				<td><strong>{{ isset($values[$group.'-'.$attribute.'-'.$product->id]) ? $values[$group.'-'.$attribute.'-'.$product->id] : '-' }}</strong></td>
				@endforeach
			</tr>
			@endforeach
			@endforeach
		</table>

	</div>

	<div class="show_more">
		<a href="{{ url($category->url) }}">Ver más {{ $category->name }}</a>
	</div>
	@endif
</div>

@push('scripts')
    <script src="{{ asset('pages/comparador/js/main.js') }}"></script>
@endpush

@endsection