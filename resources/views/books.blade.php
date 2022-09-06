@extends('layouts.app')

@section('content')
    <div class="container-lg wrapper">
        <div class="row ">
            <div class="col-3"></div>
            <div class="col-9">
                {{-- carousel start --}}
                <p class="text-muted m-0 mt-1 ps-4 fs-5">Latest Books</p>
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
                </div>
                {{-- carousel end --}}

                {{-- all books start --}}
                <div>
                    <h3 class="text-dark px-5 pt-2 pe-3 col-3 m-0">All Books</h3>
                    <div class="mt-1 px-3">{{ $books->links() }}</div>
                    <div class="d-flex flex-wrap justify-content-evenly align-items-center gap-2 mb-3 p-1">
                        @foreach ($books as $book)
                            <div class="text-center card shadow-sm border-0">
                                <div class="card-body book">
                                    @if ($book->photo == null)
                                        <img src="{{ asset('storage/default.png') }}" alt="">
                                    @else
                                        <img src="{{ asset('storage/cover/' . $book->photo) }}" alt="">
                                    @endif
                                    <small class="m-0 p-0 text-dark d-block card-title">{{ $book->title }}</small>
                                    <div class="d-flex mb-1 justify-content-around">
                                        <a href="#" class="btn btn-sm btn-primary ">View</a>
                                        <a href="#" class="btn btn-sm btn-info ">Download</a>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-success w-100">Add To Cart</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
