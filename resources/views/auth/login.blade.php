<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRM | Admin Login</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('backend/css/fontawesome-free/css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/css/icheck-bootstrap/icheck-bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/my_style.css') }}">

</head>
<style>
    body {

        background-image: url('{{ asset("backend/images/login-bg.jpg") }}');
        background-size: cover;
        /* Add more styles as needed */

    }

    .login-logo {
        font-size: 40px;
        font-weight: 600;
        letter-spacing: 10px;
    }

    /* Default styles for .login-box */
    .login-box {
        border: none;
        width: 576px;
    }

    .login-footer {
        color: whitesmoke;
    }

    /* Media query to remove width for small devices */
    @media (max-width: 767px) {
        .login-box {
            width: auto;
            padding: 10px;
            /* Set the width to auto or any other value suitable for small screens */
        }
    }

    .logo{
        font-size: 16px !important;
        font-weight: 600 !important;
    }
</style>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="row">
        <div class="col-12">
            <div class="card p-3">
                @if (session('response'))
                    <div class="alert alert-{{session('response')['status']}} alert-dismissible fade show m-3"
                         role="alert">
                        {{ session('response')['message'] }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card-body login-card-body">
                    <div class="text-center">
                        <h1 class="logo">CRM PRN-RFL Group</h1>
                    </div>
                    <form action="{{ route('admin.do-login') }}" method="post">
                        @csrf
                        <input hidden value="{{$target}}" name="target">
                        <input type="checkbox" hidden name="user" checked>
                        <div class="mb-3">
                            <div class="input-group" id="userField">
                                <input type="text" name="username" value="{{ old('username') }}"
                                       class="form-control"
                                       placeholder="Username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                @error('username')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <input type="password" required name="password" class="form-control"
                                       placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" checked id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p class="text-center text-sm text-muted my-3 login-footer"><strong>Copyright &copy; {{ date('Y') }}
                PRAN-GROUP</strong>
            All rights reserved. &nbsp; System Developed By CS-MIS-HW-Automation</p>
    </footer>
    <div class="text-center">
        <a href="{{route('admin.show-dev-mode')}}" class="btn btn-dark text-white"><i class="fas fa-code py-2"></i>&nbsp;Developer Login</a>
    </div>
</div>


<script src="{{ asset('backend/js/jquery.min.js') }}"></script>

<script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('backend/js/adminlte.min.js') }}"></script>
</body>

</html>
