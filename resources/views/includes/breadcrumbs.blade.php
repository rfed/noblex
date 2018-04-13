@if (count($breadcrumbs))

    <ul class="page-breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li>
                	<a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                	<i class="fa fa-circle"></i>
                </li>
            @else
                <li>{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ul>

@endif