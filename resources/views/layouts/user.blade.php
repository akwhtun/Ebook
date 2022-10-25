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

    {{-- <nav
        class="navbar bg-light d-flex justify-content-around align-items-center flex-wrap shadow-sm m-0 p-0 sticky-top">
        <a href="{{ route('book#all') }}" class="navbar-brand text-end m-0 p-0 py-1" style="width:8%;">
            <img src="{{ asset('admin/images/logo.png') }}" alt="logo" width="60px">
        </a>
        <div style="width: 22%">
            <ul class="d-flex justify-content-end m-0 p-0 list-unstyled">
                <li class="p-2 ms-2 text-dark">
                    <a class="text-decoration-none text-dark" href="{{ route('book#all') }}">Home</a>
                </li>
                <li class="p-2 ms-2">
                    <a class="text-decoration-none text-dark" href="{{ route('contact#page') }}">Contact Us</a>
                </li>
            </ul>
        </div>
        <div class="searchBar w-25">
            @yield('searchBar')
        </div>
        <div class="navbar nav justify-content-end m-0 p-0" style="width:27%;">
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
                                    <img src="{{ asset('storage/default_male.jpg') }}" class="img-thumbnail rounded-circle"
                                        style="width: 50px;height:50px">
                                @endif
                            @else
                                <img src="{{ asset('storage/userProfile/' . Auth::user()->image) }}"
                                    class="img-thumbnail rounded-circle" style="width: 50px;height:50px">
                            @endif
                            <p class="ms-2 text-dark
                                        pt-3"
                                style="text-transform: capitalize">
                                {{ Str::words(Auth::user()->name, 4, '...') }}</p>
                            <div class="dropdown open ms-2 me-5 pt-1">
                                <a id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-angle-down fs-4 text-dark" style="cursor: pointer"></i>
                                </a>
                                <div class="dropdown-menu m-0 p-2 bg-light" aria-labelledby="triggerId"
                                    style="width: 250px;">
                                    <div class="d-flex p-2 border border-0 border-bottom align-items-center">
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
                                        <div class="m-0 p-0 ms-1">
                                            <small class="ms-1 text-dark"
                                                style="text-transform: capitalize">{{ Str::words(Auth::user()->name, 3, '...') }}</small>
                                        </div>
                                    </div>
                                    <a class="dropdown-item bg-light text-dark  py-2 border border-0 border-bottom"
                                        href="{{ route('user#detail') }}">
                                        <i class="text-dark fs-5 fas fa-user me-2"></i>
                                        <span style="font-size: 18px;">Account</span></a>
                                    <a class="dropdown-item bg-light text-dark  py-2 border border-0 border-bottom"
                                        href="{{ route('user#changePassword', Auth::user()->id) }}">
                                        <i class="text-dark fs-5 fas fa-key me-2"></i>
                                        <span style="font-size: 18px;">Change Password</span></a>
                                    <div class="bg-light">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-dark text-light d-flex justify-content-start align-items-center w-100">
                                                <i class="fas fa-power-off mx-2 fs-5"></i><span style="font-size: 18px;"
                                                    class="ms-2">
                                                    Logout</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @yield('cart')

                @endguest
            </div>
        </div>
        <div class="pe-3 py-3 text-center d-flex align-items-center" style="width:7%;">
            <i class="far fa-moon fs-4 text-dark"></i>
            <div class="form-check form-switch mx-1">
                <input class="form-check-input check-box" style="width: 47px;height:22px" type="checkbox"
                    @if ($mode->mode == 1) checked @endif>
            </div>
            <i class="fas fa-sun fs-4 text-dark"></i>
        </div>
    </nav> --}}

    <nav class="navbar navbar-expand-sm navbar-dark px-3 bg-light d-flex flex-wrap m-0 p-0 sticky-top shadow-sm">
        <a class="navbar-brand mx-sm-5  m-0 p-0" href="{{ route('book#all') }}">
            <img src="{{ asset('admin/images/logo.png') }}" alt="logo" width="60px">
        </a>
        <button class="navbar-toggler d-lg-none text-dark border border-dark" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars fs-4 py-1"></i>
        </button>
        <div class="collapse navbar-collapse ms-sn-5 justify-content-center" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ms-3">
                <li class="nav-item active">
                    <a class="nav-link text-dark" href="{{ route('book#all') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('contact#page') }}">Contact Us</a>
                </li>
            </ul>
        </div>
        <div class="searchBar mx-3">
            @yield('searchBar')
        </div>
        <div class="navbar nav justify-content-start justify-content-xl-center m-0 p-0 mx-3 mx-xl-1 profile">
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
                                    <img src="{{ asset('storage/default_male.jpg') }}" class="img-thumbnail rounded-circle"
                                        style="width: 50px;height:50px">
                                @endif
                            @else
                                <img src="{{ asset('storage/userProfile/' . Auth::user()->image) }}"
                                    class="img-thumbnail rounded-circle" style="width: 50px;height:50px">
                            @endif
                            <p class="ms-2 text-dark
                                        pt-3"
                                style="text-transform: capitalize">
                                {{ Str::words(Auth::user()->name, 3, '...') }}</p>
                            <div class="dropdown open ms-2 me-5 pt-1">
                                <a id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-angle-down fs-4 text-dark" style="cursor: pointer"></i>
                                </a>
                                <div class="dropdown-menu m-0 p-2 bg-light" aria-labelledby="triggerId"
                                    style="width: 250px;">
                                    <div class="d-flex p-2 border border-0 border-bottom align-items-center">
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
                                        <div class="m-0 p-0 ms-1">
                                            <small class="ms-1 text-dark"
                                                style="text-transform: capitalize">{{ Str::words(Auth::user()->name, 3, '...') }}</small>
                                        </div>
                                    </div>
                                    <a class="dropdown-item bg-light text-dark  py-2 border border-0 border-bottom"
                                        href="{{ route('user#detail') }}">
                                        <i class="text-dark fs-5 fas fa-user me-2"></i>
                                        <span style="font-size: 18px;">Account</span></a>
                                    <a class="dropdown-item bg-light text-dark  py-2 border border-0 border-bottom"
                                        href="{{ route('user#changePassword', Auth::user()->id) }}">
                                        <i class="text-dark fs-5 fas fa-key me-2"></i>
                                        <span style="font-size: 18px;">Change Password</span></a>
                                    <div class="bg-light">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-dark text-light d-flex justify-content-start align-items-center w-100">
                                                <i class="fas fa-power-off mx-2 fs-5"></i><span style="font-size: 18px;"
                                                    class="ms-2">
                                                    Logout</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @yield('cart')

                @endguest
            </div>
        </div>
        <div class="pe-3 py-1 text-center d-flex align-items-center dark-light m-0 p-0">
            <i class="far fa-moon fs-4 text-dark"></i>
            <div class="form-check form-switch mx-1">
                <input class="form-check-input check-box" style="width: 47px;height:22px" type="checkbox"
                    @if ($mode->mode == 1) checked @endif>
            </div>
            <i class="fas fa-sun fs-4 text-dark"></i>
        </div>
    </nav>
    @yield('content')

    <footer class="">
        <div class="text-dark px-5 pt-5 pb-3 shadow bg-light">
            <div class="row fs-5">
                <div class="col-lg-3 col-md-6 col-12 text-lg-start text-center">
                    <h3>Quick Links</h3>
                    <ul class="list-unstyled mt-4">
                        <li class="mt-2"><a class="text-decoration-none text-dark"
                                href="{{ route('book#all') }}">Home</a>
                        </li>
                        <li class="mt-2"><a class="text-decoration-none text-dark"
                                href="{{ route('contact#page') }}">Contact</a></li>
                        @if (Auth::user() != null)
                            <li class="mt-2"><a class="text-decoration-none text-dark"
                                    href="{{ route('cart#view', Auth::user()->id) }}">Cart</a>
                            </li>
                        @endif
                        <li class="mt-2"><a class="text-decoration-none text-dark"
                                href="{{ route('registerPage') }}">
                                Sign In</a></;>
                        <li class="mt-2"><a class="text-decoration-none text-dark"
                                href="{{ route('registerPage') }}">Create
                                Account</a></;>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-12 text-lg-start text-center">
                    <h3>My Account</h3>
                    <ul class="list-unstyled mt-4">
                        <li class="mt-2">
                            <a class="text-decoration-none text-dark" href="{{ route('user#detail') }}">Profile</a>
                        </li>
                        @if (Auth::user() != null)
                            <li class="mt-2">
                                <a class="text-decoration-none text-dark"
                                    href="{{ route('user#changePassword', Auth::user()->id) }}">Change Password</a>
                            </li>
                        @endif
                        <li class="mt-2">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="border-0 text-dark bg-light pe-3">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-12 text-lg-start text-center">
                    <h3>Follow Us</h3>
                    <ul class="list-unstyled mt-4">
                        <li class="mt-2">
                            <i class="fab fa-facebook"></i>
                            Facebook
                        </li>
                        <li class="mt-2">
                            <i class="fab fa-twitter"></i>
                            Twitter
                        </li>
                        <li class="mt-2">
                            <i class="fab fa-youtube"></i>
                            Youtube
                        </li>

                        <li class="mt-2">
                            <i class="fab fa-instagram"></i>
                            Instragram
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-12 text-lg-start text-center">
                    <h3>Contacts</h3>
                    <ul class="list-unstyled mt-4">
                        <li class="mt-2">
                            <i class="fas fa-phone"></i>
                            09-890182064
                        </li>
                        <li class="mt-2">
                            <i class="fas fa-envelope"></i>
                            akwhtun@gmail.com
                        </li>
                        <li class="mt-2">
                            <i class="fas fa-map-marker-alt"></i>
                            Myanmar,Mandalay,Myingyan
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pt-3 border-top
                border-dark  border-2 text-center">
                Created by <i class="fas fa-heart text-danger"></i> <span>A.K.W.H</span> | All right reserved
            </div>
        </div>
    </footer>

    {{-- Bootstrap js --}}
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>

    {{-- JQuery --}}
    <script src="{{ asset('jquery/jquery.js') }}"></script>

    {{-- Custom Js --}}
    <script src="{{ asset('admin/js/custom.js') }}"></script>

    @yield('script')
    @yield('ajax')

</body>

</html>
