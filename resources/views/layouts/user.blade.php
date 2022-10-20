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

    <nav class="navbar text-dark bg-light d-flex justify-content-around align-items-center flex-wrap shadow-sm m-0 p-0">
        <a href="{{ route('book#all') }}" class="navbar-brand text-end m-0 p-0 py-1" style="width:8%;">
            <img src="{{ asset('admin/images/logo.png') }}" alt="logo" width="60px">
        </a>
        <div style="width: 22%">
            <ul class="d-flex  justify-content-end m-0 p-0" style="list-style-type: none">
                <li class="p-2 ms-2">Home</li>
                <li class="p-2 ms-2">About</li>
                <li class="p-2 ms-2">
                    <a href="{{ route('contact#page') }}">contact</a>
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
                            <p class="ms-2 text-black
                                        pt-3"
                                style="text-transform: capitalize">
                                {{ Str::words(Auth::user()->name, 4, '...') }}</p>
                            <div class="dropdown open ms-2 me-5 pt-1">
                                <a id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-angle-down fs-4 text-dark" style="cursor: pointer"></i>
                                </a>
                                <div class="dropdown-menu m-0 p-2" aria-labelledby="triggerId" style="width: 250px;">
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
            <i class="far fa-moon fs-5"></i>
            <div class="form-check form-switch mx-1">
                <input class="form-check-input" style="width: 47px;height:22px" type="checkbox" checked>
            </div>
            <i class="fas fa-sun fs-5 "></i>
        </div>
    </nav>
    @yield('content')
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
