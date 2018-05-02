@if ($paginator->currentPage() > 1)
<a href="{{ $paginator->url(1) }}" class="prev">
	<span>Anterior</span>
	<span class="fa fa-angle-left"></span>
</a>
@endif

@for ($i = 1; $i <= $paginator->lastPage(); $i++)
<a href="{{ $paginator->url($i) }}" class="{{ ($paginator->currentPage() == $i) ? 'current' : '' }}">{{ $i }}</a>
@endfor

@if ($paginator->currentPage() < $paginator->lastPage())
<a href="{{ $paginator->url($paginator->currentPage()+1) }}" class="next">
	<span>Siguiente</span>
	<span class="fa fa-angle-right"></span>
</a>
@endif