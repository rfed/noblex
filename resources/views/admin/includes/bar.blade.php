
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{ route('home') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>{{ ucwords(Request::segment(1)) }}</span>
        </li>
    </ul>
</div>