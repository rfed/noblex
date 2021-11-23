@include('front.includes.head')

<body id="{{ @$page_id }}">

	@include('front.includes.menu')

	<main>

		@include('front.includes.header')

		<!-- -->
		@yield('content')
		<!-- -->

	</main>


	@include('front.includes.footer')

</body>
</html>