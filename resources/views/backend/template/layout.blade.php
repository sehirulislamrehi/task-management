<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CRM</title>
    @include('backend.includes.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    .custom-alert {
        position: fixed;
        left: 50%;
        top: 1%;
        width: 30%;
        transform: translateX(-50%);
        min-height: max-content;
        z-index: 99999;
        background: white;
        border-radius: 5px;
        border: 1px solid #d1d1d1;
        box-shadow: black 1px 1px 4px -1px;
        padding: 25px 15px;
    }

    .custom-alert .logo img {
        width: 60%;
        display: block;
        margin: 0 auto;
    }

    .custom-alert p {
        text-align: center;
        margin-top: 15px;
    }

    .custom-alert h3 {
        text-align: center;
        border-bottom: 1px solid #e5e5e5;
        padding-bottom: 15px;
    }

    i {
        padding: 2px 5px;
    }

    .disableSelection {
        -webkit-user-select: none;
        /* Safari */
        -moz-user-select: none;
        /* Firefox */
        -ms-user-select: none;
        /* IE 10+ */
        user-select: none;
        /* Standard syntax */
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(42, 42, 42, 0.7);
        z-index: 1000;
        /* Ensure it's above other elements */
    }


    #loading-indicator {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(78, 78, 78, 0.8);
        backdrop-filter: blur(1px);
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        z-index: 5000;
    }

    .dark-mode input:-webkit-autofill,
    .dark-mode input:-webkit-autofill:hover,
    .dark-mode input:-webkit-autofill:focus,
    .dark-mode textarea:-webkit-autofill,
    .dark-mode textarea:-webkit-autofill:hover,
    .dark-mode textarea:-webkit-autofill:focus,
    .dark-mode select:-webkit-autofill,
    .dark-mode select:-webkit-autofill:hover,
    .dark-mode select:-webkit-autofill:focus {
        -webkit-text-fill-color: unset !important;
    }

    #loading-indicator img {
        width: 50px;
        /* Adjust the size of your loading spinner */
    }
</style>

<body class="layout-fixed control-sidebar-slide-open layout-navbar-fixed sidebar-mini">
    <div class="wrapper">

        @if( session()->has('success') || session()->has('warning') || session()->has('error') )
        <div class="alert alert-dismissible fade show custom-alert" role="alert">
            <div class="logo">
                <p><b>CRM</b><sub>v-1.0</sub></p>
            </div>
            <hr>
            @if( session()->get('success') )
            <h3>Success</h3>
            <p>{{ session()->get('success') }}</p>
            @elseif( session()->get('warning') )
            <h3>Warning</h3>
            <p>{{ session()->get('warning') }}</p>
            @elseif( session()->get('error') )
            <h3>Error</h3>
            <p>{{ session()->get('error') }}</p>
            @endif

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div id="loading-indicator" class="loader">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div>
                    <img src="{{asset('backend/images/spinner.svg')}}" style="width: 200px" alt="Loading Spinner">
                </div>
                <p class="mb-0 text-white font-weight-bold" id="loadingText" style="font-size: 20px">Loading...</p>
            </div>
        </div>

        <!-- MY MODAL -->
        <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                </div>
            </div>
        </div>
        <!-- MY MODAL END -->

        <!-- MY MODAL SMALL -->
        <div class="modal fade" id="myModalSm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="card card-default border border-0 w-100">
                    <!-- /.card-header -->
                    <div class="card-body w-100">
                        <div class="modal-content">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MY MODAL SMALL END -->

        <!-- MY MODAL large -->
        <div class="modal fade bd-example-modal-lg" id="largeModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                </div>
            </div>
        </div>
        <!-- MY MODAL large END -->

        <!-- MY MODAL Extra large -->
        <div class="modal fade bd-example-modal-lg" id="extraLargeModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">

                </div>
            </div>
        </div>
        <!-- MY MODAL Extra large END -->


        <!-- Navbar -->
        @include('backend.includes.head_panel')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('backend.includes.left_panel')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('backend.includes.footer')
    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    @include('backend.includes.script')


</body>

</html>