@extends('layouts.master')

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

    {{-- all books start --}}
    <div>
        <h3 class="text-dark px-5 pt-2 pe-3 col-3 m-0">All Books</h3>
        <div class="mt-1 px-3">{{ $books->links() }}</div>
        <div class="d-flex flex-wrap justify-content-evenly align-items-center gap-2 mb-3 p-1">
            @foreach ($books as $book)
                <div class="text-center rounded shadow-sm border-0 p-3 mt-4 d-flex flex-wrap book-info">
                    <div class="book" style="flex-basis:53%">
                        @if ($book->photo == null)
                            <img src="{{ asset('storage/default.jpg') }}" class="rounded w-100" alt="default">
                        @else
                            <img src="{{ asset('storage/cover/' . $book->photo) }}" class=" rounded w-100" alt="book cover">
                        @endif
                    </div>
                    <div class="detail" style="flex-basis: 46%">
                        <p class="m-0 p-0 text-dark">{{ $book->title }}</p>
                        <p class="m-0 p-0 text-muted">{{ $book->author }}</p>
                        <p class="mt-2">{{ Str::words($book->summary, 6, '...') }}</p>
                        <div class="ratign mt-2 text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="book-btn d-flex flex-wrap justify-content-around mt-3" style="flex-basis: 100%">
                        <a href="#" class=" py-1 mb-1 col-8 text-decoration-none text-primary text-start">See More
                            &nbsp;<i class=" fs-5 fas fa-angle-double-right"></i> </a>
                        <a href="#" class=" py-1 btn btn-danger col-5">
                            Download &nbsp;<i class="fas fa-file-download"></i>
                        </a>
                        <a href="#" class=" py-1 btn btn-success col-6">
                            Add To Cart &nbsp;<i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- </div>
        </div>
    </div> --}}
@endsection
