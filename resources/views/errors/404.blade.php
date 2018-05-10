@extends('front.layouts.app')

@section('content')

<div class="content container" id="erorr_404">
	<div style="text-align:center;">
		<h1>Error 404</h1>
		
		<p>La página que buscás no existe o ya no se encuentra disponible.</p>

		<a href="{{ route('home') }}" class="btn link">Ir a Home</a>
	</div>
	
	<div class="row">
		<div class="related_links">
			<p><strong>Tal vez te pueda interesar:</strong></p>
			
			<!-- Variable pasada desde app/Providers/ViewComposerProvider -->
			@foreach($randomCategories as $randomCategory) 

				<div class="item col-xs-12 col-sm-4">
					<a href="{{ url($randomCategory->url) }}">
						<img src="{{ url("storage/$randomCategory->image") }}" alt="{{ $randomCategory->name }}" />
					</a>
				</div>

			@endforeach
		</div>
	</div>

</div>

@endsection