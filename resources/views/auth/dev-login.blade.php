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
        background: rgb(2, 0, 36) !important;
        background: linear-gradient(79deg, rgba(2, 0, 36, 1) 0%, rgba(121, 9, 14, 1) 38%, rgba(0, 0, 0, 1) 100%, rgba(0, 212, 255, 1) 100%) !important;
        background-size: cover !important;
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

    .logo {
        font-size: 16px !important;
        font-weight: 600 !important;
    }

    .dev-card {
        background-color: black !important;
        color: whitesmoke !important;
        height: 350px !important;
    }

    .btn-dev {
        background-color: darkred;
        color: whitesmoke;
    }
    .align-self-start ul {
    }


</style>

<body class="hold-transition login-page">
<div class="login-box">
    <div class="row">
        <div class="col-12">
            <div class="card p-3 dev-card">
                @if (session('response'))
                    <div class="alert alert-{{session('response')['status']}} alert-dismissible fade show m-3"
                         role="alert">
                        {{ session('response')['message'] }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <h1 class="logo text-center py-2">CRM PRN-RFL Group | Version: 1.0 | <i class="fas fa-code">&nbsp;Developer
                        Mode</i>
                </h1>
                <div
                    class="card-body dev-card login-card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="align-self-start">
                        <h4>Three point to remember</h4>
                        <ul>
                            <li>
                                Think before you type
                            </li>
                            <li>
                                Respect the privacy of others
                            </li>
                            <li>
                                Great power comes with great responsibility
                            </li>
                        </ul>
                    </div>
                    <form action="{{ route('admin.do-login') }}" style="width: 100% !important;" method="post">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group" id="emailField">
                                <input type="email" name="email" value="{{ old('email') }}"
                                       class="form-control"
                                       placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                @error('email')
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
                                <button type="submit" class="btn btn-primary btn-dev btn-block">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p class="text-center text-sm text-white my-3 login-footer"><strong>Copyright &copy; {{ date('Y') }}
                PRAN-GROUP</strong>
            All rights reserved. &nbsp; System Developed By CS-MIS-HW-Automation</p>
    </footer>
    <div class="text-center">
        <a href="{{route("admin.show-login")}}" class="btn btn-dark text-white"><i class="fas fa-user py-2"></i>&nbsp;User
            Login</a>
    </div>
</div>


<script src="{{ asset('backend/js/jquery.min.js') }}"></script>

<script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('backend/js/adminlte.min.js') }}"></script>
<script>
    document.getElementById('option_a1').addEventListener('click', function (e) {
        var emailField = document.getElementById('emailField');
        var userField = document.getElementById('userField');
        if (e.target.value) {
            document.getElementById('option_a2').checked = false;
            if (!emailField.classList.contains('d-none')) {
                emailField.classList.add('d-none');
            }
            if (userField.classList.contains('d-none')) {
                userField.classList.remove('d-none');
            }
        }
    });
    document.getElementById('option_a2').addEventListener('click', function (e) {
        var emailField = document.getElementById('emailField');
        var userField = document.getElementById('userField');
        if (e.target.value) {
            document.getElementById('option_a1').checked = false;
            if (!userField.classList.contains('d-none')) {
                userField.classList.add('d-none');
            }
            if (emailField.classList.contains('d-none')) {
                emailField.classList.remove('d-none')
            }
        }
    });
</script>
</body>

</html>
