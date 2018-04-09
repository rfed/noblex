<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Metronic Admin Theme #1 | User Login 1</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet') }}" type="text/css" />

    <link href="{{ asset('admin/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />

    <link href="{{ asset('admin/assets/pages/css/login.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="favicon.ico" /> 
</head>

<body class="login">

     <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="index.html">
            <img src="{{ asset('admin/assets/pages/img/logo-big.png') }}" alt="" /> 
        </a>
    </div>
    <!-- END LOGO -->

    <!-- BEGIN LOGIN -->
    <div class="content">

        @yield('content')

    </div>

    <script src="{{ asset('admin/assets/global/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/global/scripts/app.min.js') }}"></script>
    
</body>

</html>