<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<title>Noblex</title>

	<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/owl-carousel/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/font-awesome/css/fontawesome-all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/media-queries.css') }}">

	<!-- GOOGLE CAPTCHA -->
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<script type='text/javascript' src="https://s3.amazonaws.com/static.conversalab.com/bots/public/salesforcechat/conversalabWebchatSalesforceLauncher.js"></script>
	<script src="//assets.etailing-la.com/newsan/noblex/js/init.js"></script>

	<meta property="og:title" content="Noblex">
	<meta property="og:site_name" content="Noblex">
	<meta property="og:url" content="{{ url('') }}">
	<meta property="og:description" content="">
	<meta property="fb:app_id" content="221366011964601">
	<meta property="og:type" content="website">
	<meta property="og:image" content="{{ asset('assets/imgs/iconos/share-web.png') }}">

	@stack('styles')
</head>