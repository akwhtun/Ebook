<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- Bootstrap css --}}
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">

    {{-- Font awesome --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    {{-- Custom css --}}
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
</head>

<body>

    <div class="row g-0">
        <div class="col-3 bg-warning min-vh-100 left-col">
            <div class="text-center p-3">
                <img src="{{ asset('admin/images/logo.png') }}" alt="logo" width="80px">
            </div>
            <div class="text-light" style="font-size:18px;">
                <p class="p-2 m-0 border-1 border-bottom border-secondary text-center text-md-start">
                    <i class="fas fa-user-cog mx-1 text-info"></i>
                    <span class="text-info d-none d-md-inline">Admin Control</span>
                </p>
                <p class="list p-2 m-0 mt-2 text-center text-md-start">
                    <i class="fas fa-home mx-1"></i>
                    <span class="d-none d-md-inline">Dashboard</span>
                </p>
                <p class="list p-2 m-0 mt-2 text-center text-md-start">
                    <i class="fas fa-users mx-1"></i>
                    <span class="d-none d-md-inline">Users</span>
                    <span class="badge bg-danger
                    rounded-pill ms-1">20</span>
                </p>
                <p class="list p-2 m-0 mt-2 text-center text-md-start">
                    <i class="fas fa-book mx-1"></i>
                    <span class="d-none d-md-inline">Book</span>
                </p>
                <p class="list p-2 m-0 mt-2 text-center text-md-start">
                    <i class="fas fa-pen-alt mx-1"></i>
                    <span class="d-none d-md-inline">Author</span>
                </p>
                <p class="list p-2 m-0 mt-2 text-center text-md-start">
                    <i class="fas fa-chart-bar mx-1"></i>
                    <span class="d-none d-md-inline">Category</span>
                </p>
                @if (Auth::user()->role == 'admin')
                    <p class="list p-2 m-0 mt-2 text-center text-md-start">
                        <i class="fab fa-first-order mx-1"></i>
                        <span class="d-none d-md-inline">Order</span>
                    </p>
                @endif
            </div>
        </div>
        <div class="col-9">
            <nav class="navbar text-dark bg-light d-flex justify-content-around flex-wrap shadow-sm">
                <a href="#" class="navbar-brand" style="width:15%;">
                    <!-- <img src="./logo.png" alt="logo" width="60px">  -->
                </a>
                <div class="input-group searchBar">
                    <input type="search" class="form-control">
                    <button class="btn btn-dark"><i class="fas fa-search"></i></button>
                </div>
                <div class="navbar nav ms-5 justify-content-end" style="width:20%;">
                    <div class="nav-item d-flex align-items-center">
                        @guest
                            @if (Route::has('login'))
                                <a class="nav-link text-dark" href="{{ route('loginPage') }}">Login</a>
                            @endif

                            @if (Route::has('register'))
                                <a class="nav-link text-dark" href="{{ route('registerPage') }}">Register</a>
                            @endif
                        @else
                            <div class="nav-link">
                                <div class="d-flex">
                                    <img src="{{ asset('admin/images/profile.jpg') }}" alt="profile" width="43px"
                                        height="43px" class="rounded-circle">
                                    <p class="ms-3 pt-2 text-black">Admin</p>
                                </div>
                            </div>
                            <div class="dropdown">
                                <p data-bs-toggle="dropdown" class="mt-3 dropdown-icon px-2"><i
                                        class="fas fa-angle-down fs-5"></i></p>
                                <div class="border-0 shadow-sm dropdown-menu" style="width:220px; height: 110px;">
                                    <div class="px-2 py-2 border-bottom d-flex">
                                        <img src="{{ asset('admin/images/profile.jpg') }}" class="rounded" alt="profile"
                                            width="60px" height="50px">
                                        <div class="ms-2">
                                            <span class="text-muted mt-2">Admin</span>
                                            <span class="text-muted mt-2">Admin@gmail.com</span>
                                        </div>
                                    </div>
                                    <p class="text-dark bg-light p-2 mb-0 border-bottom"><i
                                            class="fa fa-user-circle mx-3"></i>Profile</p>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-dark bg-success text-start p-2 w-100 border-0"><i
                                                class="fas fa-power-off mx-3"></i>Logout</button>
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
                <div class="pe-3 py-3 text-end" style="width:17%;">
                    <i class="far fa-moon fs-4 me-2"></i>
                    <i class="fas fa-sun fs-4  me-2 d-none"></i>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>

    {{-- Bootstrap js --}}
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
