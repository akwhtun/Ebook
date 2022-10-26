@extends('layouts.user')

@section('searchBar')
    <form method="get">
        <div class="input-group">
            <input type="search" name="searchKey" value="{{ request('searchKey') }}" class="form-control"
                placeholder="Search By Book Name...">
            <button class="btn bg-black text-light"><i class="fas fa-search"></i></button>
        </div>
    </form>
@endsection

@if (Auth::user() != null)
    @section('cart')
        <form action="{{ route('cart#view', Auth::user()->name) }}" method="GET">
            <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
            <button type="submit" class="border-0  bg-light text-dark">
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

    {{-- all books start --}}
    <input type="hidden" class="mode" value="@if ($mode->mode == 1) dark-mode @else light-mode @endif">
    <div class="row g-0 con min-vh-100">
        <div class="col-3 col-left left-col">
            <div class="text-light mt-4" style="font-size:18px;">
                @if (Auth::user() != null)
                    <a href="{{ route('order#history', Auth::user()->id) }}"
                        class="d-flex justify-content-md-between justify-content-center align-items-center text-decoration-none text-white ano-list d-block p-2 m-0 mt-2 text-center text-md-start">
                        <div>
                            <i class="fas fa-history  ms-3"></i>
                            <span class="d-none d-md-inline ms-1">Order History
                            </span>
                        </div>
                        <small class="text-white bg-danger rounded-circle p-1 me-4 badge ms-3">{{ count($history) }}</small>
                    </a>
                @endif
                @if (Auth::user() != null)
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('admin', Auth::user()->role) }}"
                            class="text-decoration-none text-white ano-list d-block p-2 m-0 mt-2 text-center text-md-start">
                            <i class="fas fa-user-secret ms-0 ms-md-3"></i>
                            <span class="d-none d-md-inline ms-1">Go Admin
                            </span>
                        </a>
                    @endif
                @endif
                <a href=""
                    class="text-decoration-none text-white ano-list d-block p-2 m-0 mt-2 text-center text-md-start all-book">
                    <i class="fas fa-book-open ms-0 ms-md-3"></i>
                    <span class="d-none d-md-inline ms-1">All Books
                    </span>
                </a>
            </div>
            <div class="text-light" style="font-size:18px;">
                <p class="p-2 m-0 border-1 border-bottom border-secondary text-center text-md-start">
                    <span class="text-dark d-none d-md-inline text-uppercase">Filter By Author</span>
                </p>
                <div class="lists">
                    <span
                        class="d-flex justify-content-between align-items-center text-decoration-none text-white header-list d-block p-2 m-0 mt-2 text-center text-md-start">
                        <div>
                            <i class="fas fa-pen-alt ms-3"></i>
                            <span class="d-none d-md-inline ms-1">Authors
                            </span>
                            <small class="text-white bg-dark rounded-circle p-1 badge">{{ count($authors) }}</small>
                        </div>
                        <i class="fas fa-angle-down me-4 down-arrow" style="cursor: pointer"></i>
                    </span>
                    <p class="li-group authors">
                        @foreach ($authors as $author)
                            <a href="{{ route('author#filter', $author->id) }}"
                                class="text-decoration-none text-white ano-list d-block p-2 m-0 text-md-start text-center">
                                <span class="d-inline ms-3  text-white">{{ $author->name }}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
            </div>
            <div class="text-light" style="font-size:18px;">
                <p class="p-2 m-0 border-1 border-bottom border-secondary text-center text-md-start">
                    <span class="text-dark d-none d-md-inline text-uppercase">Filter By Category</span>
                </p>
                <div class="lists">
                    <span
                        class="d-flex justify-content-between align-items-center text-decoration-none text-white header-list d-block p-2 m-0 mt-2 text-center text-md-start">
                        <div>
                            <i class="fas fa-list-alt ms-3"></i>
                            <span class="d-none d-md-inline ms-1"> Categories
                            </span>
                            <small class="text-white bg-dark rounded-circle p-1 badge">{{ count($categories) }}</small>
                        </div>
                        <i class="fas fa-angle-down me-4 down-arrow" style="cursor: pointer"></i>
                    </span>
                    <p class="li-group categories">
                        @foreach ($categories as $category)
                            <a href="{{ route('category#filter', $category->id) }}"
                                class="text-decoration-none text-white ano-list d-block p-2 m-0 text-start">
                                <span class="d-inline ms-3  text-white">{{ $category->name }}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>

        <div class="col-9 con ch-bg book-data flex-column" id="data">
            @include('user.bookData')
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/js/light-dark.js') }}"></script>
@endsection

@section('ajax')
    <script>
        //add to cart
        $(document).ready(function() {
            $('.book-data').delegate('.add-cart', 'click', function() {
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
                    error: function() {
                        window.location.href = '/loginPage';
                    }
                })
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            //pagination by ajax
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                $page = $(this).attr('href').split('page=')[1];
                fetchData($page);
            })

            function fetchData(page) {
                $.ajax({
                    type: 'get',
                    url: '/pagination?page=' + page,
                    success: function(data) {
                        $('#data').html(data);

                        mode();

                    }
                })
            }

            //author filter by ajax

            $(document).on('click', '.authors a', function(e) {
                e.preventDefault();
                $author = $(this).attr('href').split('authors/filter/')[1];
                fetchAuthor($author);
            })

            function fetchAuthor(author) {
                $.ajax({
                    type: 'get',
                    url: '/filterAuthor/' + author,
                    success: function(data) {
                        $('#data').html(data);

                        mode();
                    }
                })
            }

            //category filter by ajax

            $(document).on('click', '.categories a', function(e) {
                e.preventDefault();
                $category = $(this).attr('href').split('categories/filter/')[1];
                fetchCategory($category);
            })

            function fetchCategory(category) {
                $.ajax({
                    type: 'get',
                    url: '/filterCategory/' + category,
                    success: function(data) {
                        $('#data').html(data);

                        mode();
                    }
                })
            }

            //get all book

            $(document).on('click', '.all-book', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'get',
                    url: '/books',
                    success: function(data) {
                        $('#data').html(data);

                        mode();
                    }
                })
            })


            function mode() {
                //light dark
                $view = $('.mode').val();
                if ($view == ' light-mode ') {
                    $('.bg-light').removeClass('bg-dark');
                    $('.text-dark').removeClass('text-white');
                    $('.border-dark').removeClass('border-white');
                    $('.ch-bg').addClass('con');
                    $('.ch-bg').remove('bg-black');
                    $('.left-col').removeClass('ano-left-col');
                }
                if ($view == ' dark-mode ') {
                    $('.bg-light').addClass('bg-dark');
                    $('.text-dark').addClass('text-white');
                    $('.border-dark').addClass('border-white');
                    $('.ch-bg').removeClass('con');
                    $('.ch-bg').addClass('bg-black');
                    $('.left-col').addClass('ano-left-col');
                }

            }
        })
    </script>
@endsection
