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



	<script src="assets/jquery/jquery-1.12.3.min.js"></script>
	<script src="assets/owl-carousel/owl.carousel.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>

	<script src="assets/js/css3-mediaqueries.js"></script>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.js"></script>
</body>
</html>