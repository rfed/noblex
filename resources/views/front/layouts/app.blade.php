@include('front.includes.head')

<body>

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