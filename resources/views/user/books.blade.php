@extends('layouts.user')

@section('content')
    {{-- <div class="container-lg wrapper">
        <div class="row ">
            <div class="col-3"></div>
            <div class="col-9"> --}}
    {{-- carousel start --}}
    {{-- <p class="text-muted m-0 mt-1 ps-4 fs-5">Latest Books</p>
                <div class="carousel slide border-bottom border-3 p-2 " data-bs-ride="carousel" id="slide">
                    <div class="carousel-inner w-75 mx-auto">
                        <div class="carousel-item active">
                            <div class="d-flex slide-img justify-content-around align-items-center ">
                                <img src="{{ asset('images/img.jpg') }}" width="120px">
                                <img src="{{ asset('images/img.jpg') }}" width="120px">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex slide-img justify-content-around align-items-center ">
                                <img src="{{ asset('images/img2.jpg') }}" width="120px">
                                <img src="{{ asset('images/img2.jpg') }}" width="120px">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex slide-img justify-content-around align-items-center ">
                                <img src="{{ asset('images/img3.jpg') }}" alt="">
                                <img src="{{ asset('images/img3.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <a href="#slide" class="carousel-control-prev" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a href="#slide" class="carousel-control-next" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div> --}}
    {{-- carousel end --}}
    {{-- <a href="{{ route('download#book') }}" class="btn btn-danger">Download</a> --}}
    {{-- <h3 class="text-dark px-5 pt-2 pe-3 col-3 m-0">All Books</h3> --}}

    {{-- all books start --}}
    <div class="row g-0 con min-vh-100 ">
        <div class="col-2 left-col">
            <div class="text-light" style="font-size:18px;">
                <p class="p-2 m-0 border-1 border-bottom border-secondary text-center text-md-start">
                    <span class="text-info d-none d-md-inline text-uppercase">Filter By Category</span>
                </p>
                <div class="lists">
                    <span class="text-decoration-none text-white header-list d-block p-2 m-0 mt-2 text-center text-md-start">
                        <span class="d-none d-md-inline ms-3">All Categories</span>
                        <i class="fas fa-angle-down ms-5 down-arrow" style="cursor: pointer"></i>
                    </span>
                    <p class="li-group">
                        <a href="{{ route('account#adminList') }}"
                            class="text-decoration-none text-white ano-list d-block p-2 m-0 text-start">
                            <span class="d-none d-md-inline ms-3 text-decoration-none text-white">Helath</span>
                        </a>
                        <a href="{{ route('account#userList') }}"
                            class="text-decoration-none text-white ano-list d-block p-2 m-0 text-start">
                            <span class="d-none d-md-inline ms-3 text-decoration-none text-white">Business</span>
                        </a>
                        <a href="{{ route('book#list') }}"
                            class="text-decoration-none text-white ano-list d-block p-2 m-0 text-start">
                            <span class="d-none d-md-inline ms-3">Agricultural</span>
                        </a>
                        <a href="{{ route('author#list') }}"
                            class="text-decoration-none text-white ano-list d-block p-2 m-0 text-start">
                            <span class="d-none d-md-inline ms-3">Technical</span>
                        </a>
                        <a href="{{ route('category#list') }}"
                            class="text-decoration-none text-white ano-list d-block p-2 m-0 text-start">
                            <span class="d-none d-md-inline ms-3">Language</span>
                        </a>
                    </p>
                </div>
                <div class="lists">
                    <span
                        class="text-decoration-none text-white header-list d-block p-2 m-0 mt-2 text-center text-md-start">
                        <i class="fas fa-home mx-1"></i>
                        <span class="d-none d-md-inline">Dashboard</span>
                        <i class="fas fa-angle-down ms-5 down-arrow" style="cursor: pointer"></i>
                    </span>
                    <p class="li-group">
                        <a href="{{ route('account#adminList') }}"
                            class="text-decoration-none text-white ano-list d-block p-2 m-0 text-center text-md-start">
                            <i class="fas fa-user-secret mx-1"></i>
                            <span class="d-none d-md-inline text-decoration-none text-white">Admins</span>
                        </a>
                        <a href="{{ route('account#userList') }}"
                            class="text-decoration-none text-white ano-list d-block p-2 m-0 text-center text-md-start">
                            <i class="fas fa-users mx-1"></i>
                            <span class="d-none d-md-inline text-decoration-none text-white">Users</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-10">
            <div class="d-flex flex-wrap justify-content-evenly align-items-center gap-2 mb-3 p-2">
                @foreach ($books as $book)
                    <div class="text-center rounded shadow-sm border-0 p-3 mt-4 d-flex flex-wrap book-info">
                        <div class="book" style="flex-basis:53%">
                            @if ($book->photo == null)
                                <img src="{{ asset('storage/default.jpg') }}" class="rounded w-100" alt="default">
                            @else
                                <img src="{{ asset('storage/cover/' . $book->photo) }}" class=" rounded w-100"
                                    alt="book cover">
                            @endif
                        </div>
                        <div class="detail" style="flex-basis: 46%">
                            <p class="m-0 p-0 text-dark">{{ $book->title }}</p>
                            <p class="m-0 p-0 text-muted">{{ $book->author_name }}</p>
                            {{-- <p class="mt-2" style="margin-left: 1px">{{ Str::words($book->summary, 6, '...') }}</p> --}}
                            <p class="mt-2 p-0 text-success">{{ $book->price }} kyats</p>
                            <p class="mt-2 p-0 text-dark"> <i class="fas fa-eye"></i> 0</p>
                            <div class="ratign mt-2 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="book-btn mt-3">
                            <div class="d-flex justify-content-between">
                                <a href="#" class=" py-1 btn btn-outline-primary">
                                    <span class="m-0 p-0">{{ count($book->comments) }} Comments</span> &nbsp;<i
                                        class="fas fa-comment-alt"></i>
                                </a>
                                <a href="{{ route('book#detail', $book->id) }}"
                                    class=" py-1 text-decoration-none text-primary">See More
                                    &nbsp;<i class=" fs-5 fas fa-angle-double-right"></i> </a>
                            </div>
                            <div class="mt-2 d-flex justify-content-between">
                                <a href="{{ route('download#book', $book->id) }}" class=" py-1 btn btn-danger ">
                                    Download &nbsp;<i class="fas fa-file-download"></i>
                                </a>
                                <a href="#" class=" py-1 btn btn-success d-block ms-4">
                                    Add To Cart &nbsp;<i class="fas fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-1 px-3">{{ $books->links() }}</div>
        </div>
    </div>
    {{-- </div>
        </div>
    </div> --}}
@endsection
