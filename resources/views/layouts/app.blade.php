@include('includes.head')

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        
        @include('includes.header')

        <!-- BEGIN CONTAINER -->
        <div class="page-container">

            @include('includes.menu')

            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">

                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">

                    @include('includes.bar')

                    
                    @yield('content')

                </div>
                <!-- END CONTENT BODY -->

            </div>
            <!-- END CONTENT WRAPPER -->

        </div>
        <!-- END PAGE-CONTAINER -->

@include('includes.footer')