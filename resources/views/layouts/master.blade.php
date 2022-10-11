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

    <div class="row g-0 con">
        <div class="col-3 min-vh-100 left-col">
            <div class="text-center p-3">
                <a href="{{ route('book#all') }}">
                    <img src="{{ asset('admin/images/logo.png') }}" alt="logo" width="80px">
                </a>
            </div>
            <div class="text-light" style="font-size:18px;">
                <p class="p-2 m-0 border-1 border-bottom border-secondary text-center text-md-start">
                    <i class="fas fa-user-cog mx-1 text-info"></i>
                    <span class="text-info d-none d-md-inline">Admin Control</span>
                </p>
                <a href=""
                    class="text-decoration-none text-white list d-block p-2 m-0 mt-2 text-center text-md-start">
                    <i class="fas fa-home mx-1"></i>
                    <span class="d-none d-md-inline">Dashboard</span>
                </a>
                <a href="{{ route('account#adminList') }}"
                    class="text-decoration-none text-white list d-block p-2 m-0 mt-2 text-center text-md-start">
                    <i class="fas fa-user-secret mx-1"></i>
                    <span class="d-none d-md-inline text-decoration-none text-white">Admins</span>
                </a>
                <a href="{{ route('account#userList') }}"
                    class="text-decoration-none text-white list d-block p-2 m-0 mt-2 text-center text-md-start">
                    <i class="fas fa-users mx-1"></i>
                    <span class="d-none d-md-inline text-decoration-none text-white">Users</span>
                </a>
                <a href="{{ route('book#list') }}"
                    class="text-decoration-none text-white list d-block p-2 m-0 mt-2 text-center text-md-start">
                    <i class="fas fa-book mx-1"></i>
                    <span class="d-none d-md-inline">Books</span>
                </a>
                <a href="{{ route('author#list') }}"
                    class="text-decoration-none text-white list d-block p-2 m-0 mt-2 text-center text-md-start">
                    <i class="fas fa-pen-alt mx-1"></i>
                    <span class="d-none d-md-inline">Authors</span>
                </a>
                <a href="{{ route('category#list') }}"
                    class="text-decoration-none text-white list d-block p-2 m-0 mt-2 text-center text-md-start">
                    <i class="fas fa-chart-bar mx-1"></i>
                    <span class="d-none d-md-inline">Categories</span>
                </a>
                @if (!empty(Auth::user()))
                    <p class="list p-2 m-0 mt-2 text-center text-md-start">
                        <i class="fab fa-first-order mx-1"></i>
                        <span class="d-none d-md-inline">Order</span>
                    </p>
                @endif
            </div>
        </div>
        <div class="col-9">
            <nav class="navbar text-dark bg-light d-flex justify-content-around flex-wrap shadow-sm m-0 p-0">
                <a href="#" class="navbar-brand" style="width:8%;">
                    <!-- <img src="./logo.png" alt="logo" width="60px">  -->
                </a>
                <div class="searchBar">
                    @yield('searchBar')
                </div>
                <div class="navbar nav justify-content-end m-0 p-0" style="width:32%;">
                    <div class="nav-item d-flex align-items-center m-0 p-0">
                        @guest
                            @if (Route::has('login'))
                                <a class="nav-link text-dark" href="{{ route('loginPage') }}">Login</a>
                            @endif

                            @if (Route::has('register'))
                                <a class="nav-link text-dark" href="{{ route('registerPage') }}">Register</a>
                            @endif
                        @else
                            <div class="nav-link m-0 p-0">
                                <div class="d-flex align-items-center">
                                    @if (Auth::user()->image == null)
                                        @if (Auth::user()->gender == 'Female')
                                            <img src="{{ asset('storage/default_female.jpg') }}"
                                                class="img-thumbnail rounded-circle" style="width: 50px;height:50px">
                                        @else
                                            <img src="{{ asset('storage/default_male.jpg') }}"
                                                class="img-thumbnail rounded-circle" style="width: 50px;height:50px">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/userProfile/' . Auth::user()->image) }}"
                                            class="img-thumbnail rounded-circle" style="width: 50px;height:50px">
                                    @endif
                                    <p class="ms-2 text-black
                                        pt-3"
                                        style="text-transform: capitalize">
                                        {{ Str::words(Auth::user()->name, 4, '...') }}</p>
                                    <div class="dropdown open ms-2 me-5 pt-1">
                                        <a id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-angle-down fs-4 text-dark" style="cursor: pointer"></i>
                                        </a>
                                        <div class="dropdown-menu m-0 p-0" aria-labelledby="triggerId">
                                            <div class="d-flex p-2 border border-0 border-bottom align-items-center">
                                                @if (Auth::user()->image == null)
                                                    @if (Auth::user()->gender == 'Female')
                                                        <img src="{{ asset('storage/default_female.jpg') }}"
                                                            class="img-thumbnail rounded-circle"
                                                            style="width: 50px;height:50px">
                                                    @else
                                                        <img src="{{ asset('storage/default_male.jpg') }}"
                                                            class="img-thumbnail rounded-circle"
                                                            style="width: 50px;height:50px">
                                                    @endif
                                                @else
                                                    <img src="{{ asset('storage/userProfile/' . Auth::user()->image) }}"
                                                        class="img-thumbnail rounded-circle"
                                                        style="width: 50px;height:50px">
                                                @endif
                                                <div class="m-0 p-0 ms-1">
                                                    <small class="ms-1"
                                                        style="text-transform: capitalize">{{ Str::words(Auth::user()->name, 3, '...') }}</small>
                                                </div>
                                            </div>
                                            <a class="dropdown-item  py-2 border border-0 border-bottom"
                                                href="{{ route('account#detail') }}">
                                                <i class="text-dark fs-5 fas fa-user me-2"></i>
                                                <span style="font-size: 18px;">Account</span></a>
                                            <a class="dropdown-item  py-2 border border-0 border-bottom" href="">
                                                <i class="text-dark fs-5 fas fa-key me-2"></i>
                                                <span style="font-size: 18px;"> Change Password</span></a>
                                            <div class="">
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-dark text-white  d-flex justify-content-start align-items-center w-100">
                                                        <i class="fas fa-power-off mx-2 fs-5"></i><span
                                                            style="font-size: 18px;" class="ms-2">
                                                            Logout</span></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="dropdown">
                                <p data-bs-toggle="dropdown" class="mt-3 dropdown-icon px-2"><i
                                        class="fas fa-angle-down fs-5"></i></p>
                                <div class="border-0 shadow-sm dropdown-menu" style="width:230px; height: 220px;">
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
                            </div> --}}
                        @endguest
                    </div>
                </div>
                <div class="pe-3 py-3 text-center" style="width:10%;">
                    <i class="far fa-moon fs-4 me-2"></i>
                    <i class="fas fa-sun fs-4  me-2"></i>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>

    {{-- Bootstrap js --}}
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>

    {{-- JQuery --}}
    <script src="{{ asset('jquery/jquery.js') }}"></script>

    {{-- Custom Js --}}
    <script src="{{ asset('admin/js/custom.js') }}"></script>
</body>

</html>
