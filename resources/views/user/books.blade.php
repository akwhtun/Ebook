@extends('layouts.user')

@section('searchBar')
    <form method="get">
        <div class="input-group">
            <input type="search" name="searchKey" value="{{ request('searchKey') }}" class="form-control"
                placeholder="Search By Book Name...">
            <button class="btn btn-dark"><i class="fas fa-search"></i></button>
        </div>
    </form>
@endsection

@if (Auth::user() != null)
    @section('cart')
        <form action="{{ route('cart#view', Auth::user()->name) }}" method="GET">
            <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
            <button type="submit" class="border-0 bg-light text-dark">
                <div class="d-flex align-items-center">
                    <i class="fas fa-shopping-cart cart"></i>
                    <span
                        class="badge rounded-circle border border-secondary text-dark ms-1 cart-qty cart-count">{{ count($carts) }}</span>
                </div>
            </button>
        </form>
    @endsection
@endif

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
                    <span class="text-info d-none d-md-inline text-uppercase">Filter By Price</span>
                </p>
                <div class="lists">
                    <span
                        class="d-flex justify-content-between align-items-center text-decoration-none text-white header-list d-block p-2 m-0 mt-2 text-center text-md-start">
                        <span class="d-none d-md-inline ms-3"><i class="fas fa-money-bill-alt me-1"></i> All Price
                        </span>
                        <i class="fas fa-angle-down me-4 down-arrow" style="cursor: pointer"></i>
                    </span>
                    <p class="li-group m-0 p-0">
                        <a href=""
                            class="text-decoration-none text-white ano-list d-flex justify-content-between align-items-center p-0 m-0 text-start">
                            <span class="d-none d-md-inline ms-4 text-white">
                                <input type="checkbox">
                                <small>1000 - 2000</small>
                            </span>
                            <small class="bg-dark text-white rounded-circle p-1 me-4" style="font-size: 12px">20</small>
                        </a>
                        <a href=""
                            class="text-decoration-none text-white ano-list d-flex justify-content-between align-items-center p-0 m-0 text-start">
                            <span class="d-none d-md-inline ms-4 text-white">
                                <input type="checkbox">
                                <small>3000 - 4000</small>
                            </span>
                            <small class="bg-dark text-white rounded-circle p-1 me-4" style="font-size: 12px">20</small>
                        </a>
                        <a href=""
                            class="text-decoration-none text-white ano-list d-flex justify-content-between align-items-center p-0 m-0 text-start">
                            <span class="d-none d-md-inline ms-4 text-white">
                                <input type="checkbox">
                                <small>5000 - 6000</small>
                            </span>
                            <small class="bg-dark text-white rounded-circle p-1 me-4" style="font-size: 12px">20</small>
                        </a>
                        <a href=""
                            class="text-decoration-none text-white ano-list d-flex justify-content-between align-items-center p-0 m-0 text-start">
                            <span class="d-none d-md-inline ms-4 text-white">
                                <input type="checkbox">
                                <small>7000 - 8000</small>
                            </span>
                            <small class="bg-dark text-white rounded-circle p-1 me-4" style="font-size: 11px">20</small>
                        </a>
                    </p>
                </div>
            </div>
            <div class="text-light" style="font-size:18px;">
                <p class="p-2 m-0 border-1 border-bottom border-secondary text-center text-md-start">
                    <span class="text-info d-none d-md-inline text-uppercase">Filter By Author</span>
                </p>
                <div class="lists">
                    <span
                        class="d-flex justify-content-between align-items-center text-decoration-none text-white header-list d-block p-2 m-0 mt-2 text-center text-md-start">
                        <span class="d-none d-md-inline ms-3"><i class="fas fa-pen-alt me-1"></i> Authors
                            <small class="text-white bg-dark rounded-circle p-1">{{ count($authors) }}</small></span>
                        <i class="fas fa-angle-down me-4 down-arrow" style="cursor: pointer"></i>
                    </span>
                    <p class="li-group">
                        @foreach ($authors as $author)
                            <a href="{{ route('author#filter', $author->id) }}"
                                class="text-decoration-none text-white ano-list d-block p-2 m-0 text-start">
                                <span class="d-none d-md-inline ms-3  text-white">{{ $author->name }}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
            </div>
            <div class="text-light" style="font-size:18px;">
                <p class="p-2 m-0 border-1 border-bottom border-secondary text-center text-md-start">
                    <span class="text-info d-none d-md-inline text-uppercase">Filter By Category</span>
                </p>
                <div class="lists">
                    <span
                        class="d-flex justify-content-between align-items-center text-decoration-none text-white header-list d-block p-2 m-0 mt-2 text-center text-md-start">
                        <span class="d-none d-md-inline ms-3"><i class="fas fa-list-alt me-1"></i> Categories
                            <small class="text-white bg-dark rounded-circle p-1">{{ count($categories) }}</small></span>
                        <i class="fas fa-angle-down me-4 down-arrow" style="cursor: pointer"></i>
                    </span>
                    <p class="li-group">
                        @foreach ($categories as $category)
                            <a href="{{ route('category#filter', $category->id) }}"
                                class="text-decoration-none text-white ano-list d-block p-2 m-0 text-start">
                                <span class="d-none d-md-inline ms-3  text-white">{{ $category->name }}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
        <div class="col-10">
            @if (count($books) > 0)
                <div class="d-flex flex-wrap justify-content-start align-items-center gap-3 mb-3 p-2">
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
                                    <a href="{{ route('book#detail', $book->id) }}"
                                        class=" py-1 btn btn-outline-secondary">
                                        <span class="m-0 p-0">{{ count($book->comments) }} Comments</span> &nbsp;<i
                                            class="fas fa-comment-alt"></i>
                                    </a>
                                    <a href="{{ route('book#detail', $book->id) }}"
                                        class=" py-1 text-decoration-none text-primary">See More
                                        &nbsp;<i class=" fs-5 fas fa-angle-double-right"></i> </a>
                                </div>
                                <div class="mt-2 d-flex justify-content-between cart-Buttons">
                                    @if (Auth::user() != null)
                                        <input type="hidden" id="userId" value="{{ Auth::user()->id }}">
                                    @endif
                                    <input type="hidden" id="bookId" value="{{ $book->id }}">
                                    <a href="{{ route('download#book', $book->id) }}" class=" py-1 btn btn-primary ">
                                        Download &nbsp;<i class="fas fa-file-download"></i>
                                    </a>
                                    <span class="py-1 btn btn-success d-block ms-4 add-cart" style="cursor: pointer">
                                        Add To Cart &nbsp;<i class="fas fa-shopping-cart"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-1 px-3">{{ $books->links() }}</div>
            @else
                <div class="text-center mt-5">
                    <p class="fs-4 text-muted">No Book Found...😞</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('ajax')
    <script>
        //add to cart
        $(document).ready(function() {
            $('.add-cart').on('click', function() {
                $cart = $('.cart');
                $count = $('.cart-qty');
                $cart.removeClass('shopping-cart');
                $count.removeClass('cart-count');

                $cartQty = parseInt($('.cart-qty').html());
                $userId = $(this).closest('.cart-Buttons').find('#userId').val();
                $bookId = $(this).closest('.cart-Buttons').find('#bookId').val();
                $qty = 1;
                $data = {
                    'userId': $userId,
                    'bookId': $bookId,
                    'qty': $qty
                };
                $.ajax({
                    type: 'get',
                    url: '/carts/add',
                    data: $data,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'true') {
                            $cart.addClass('shopping-cart');
                            $count.addClass('cart-count');

                            $cartQty += 1;
                            $('.cart-qty').html($cartQty);
                        }
                    },
                    // error: function() {
                    //     window.location.href = '/loginPage';
                    // }
                })
            });
        })
    </script>
@endsection
