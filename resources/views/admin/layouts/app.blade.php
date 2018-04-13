@include('admin.includes.head')

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        
        @include('admin.includes.header')

        <!-- BEGIN CONTAINER -->
        <div class="page-container">

            @include('admin.includes.menu')

            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">

                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">

                    @include('admin.includes.bar')

                    <br>
                    @yield('content')

                </div>
                <!-- END CONTENT BODY -->

            </div>
            <!-- END CONTENT WRAPPER -->

        </div>
        <!-- END PAGE-CONTAINER -->

@include('admin.includes.footer')

<script>
    toastr.options = {
        "timeOut": "3000",
    }
    @if(Session('success'))
        toastr.success("{{ Session('success') }}");
    @endif 
    @if(Session('info'))
        toastr.info("{{ Session('info') }}");
    @endif 
    @if(Session('danger'))
        toastr.error("{{ Session('danger') }}");
    @endif 
</script>