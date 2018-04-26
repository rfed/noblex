@extends('front.layouts.app')

@section('content')

<div class="content container">
	<h1>Error 404</h1>
	
	<p>La página que buscás no existe o ya no se encuentra disponible.</p>

	<a href="{{ route('home') }}" class="btn link">Ir a Home</a>
	
	<div class="row">
		<div class="related_links">
			<p><strong>Tal vez te pueda interesar:</strong></p>
			
			<!-- Variable pasada desde app/Providers/ViewComposerProvider -->
			@foreach($latestCategories as $latesCategory) 

				<div class="item col-xs-12 col-sm-4">
					<a href="{{ url($latesCategory->url) }}">
						<img src="{{ url("storage/$latesCategory->image") }}" alt="{{ $latesCategory->name }}" />
					</a>
				</div>

			@endforeach
		</div>
	</div>

</div>

@endsection