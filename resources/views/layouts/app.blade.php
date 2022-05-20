<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Becky Ada">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'habari') }} - Authentication</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1>
                    <a class="text-dark" href="{{ url('/') }}">
                        {{ config('app.name', 'e-consular') }}
                    </a>
                </h1>
            </div>
            <div class="card-body">
                
                <p class="login-box-msg">@yield('title')</p>
                @if (session('error'))
                    <div class="alert alert-danger text-center msg" id="error">
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success text-center msg" id="error">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                @if (session('msg'))
                    <div class="alert alert-info text-center msg" id="error">
                        <strong>{{ session('msg') }}</strong>
                    </div>
                @endif

                @yield('content')

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/adminlte.min.js')}}"></script>
</body>

</html>