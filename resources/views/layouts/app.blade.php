<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ebook</title>
    {{-- Bootstrap css --}}
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">

    {{-- Font awesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    {{-- Custom css --}}
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">

    {{-- custom css --}}
    <style>
        .register,
        .login {
            max-width: 500px;
            margin: 0px auto;
        }
    </style>
</head>

<body>
    <nav class="navbar text-dark bg-light d-flex justify-content-around flex-wrap shadow-sm">
        <a href="#" class="navbar-brand" style="width:55%;">
            <img src="{{ asset('admin/images/logo.png') }}" class="ms-5" alt="logo" width="60px">
        </a>
        <div class="navbar nav ms-5 justify-content-end" style="width:20%;">
            <div class="nav-item d-flex align-items-center">
                <a class="nav-link text-dark" href="{{ route('loginPage') }}">Login</a>
                <a class="nav-link text-dark" href="{{ route('registerPage') }}">Register</a>
            </div>
        </div>
        <div class="pe-3 py-3 text-end" style="width:17%;">
            <i class="far fa-moon fs-4 me-2"></i>
            <i class="fas fa-sun fs-4  me-2 d-none"></i>
        </div>
    </nav>
    @yield('content')
    {{-- Bootstrap js --}}
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
