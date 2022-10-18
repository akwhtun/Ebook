@extends('layouts.user')

@section('cart')
    <form action="{{ route('cart#view', Auth::user()->name) }}" method="GET">
        <input type="hidden" name="userId" value="{{ Auth::user()->id }}" class="userIdCode">
        <button type="submit" class="border-0 bg-light text-dark">
            <div class="d-flex align-items-center">
                <i class="fas fa-shopping-cart cart"></i>
                <span
                    class="badge rounded-circle border border-secondary text-dark ms-1 cart-qty">{{ count($carts) }}</span>
            </div>
        </button>
    </form>
@endsection

@section('content')
    <div class="mt-1 px-5 py-3 row g-0 data">
        @if (count($carts) > 0)
            <div class="col-8">
                <table class="w-100">
                    <tr class="text-center">
                        <th class="col-2">Book</th>
                        <th class="col-2">Title</th>
                        <th class="col-2">Price</th>
                        <th class="col-2">Quantity</th>
                        <th class="col-2">Total</th>
                        <th class="col-2">Remove</th>
                    </tr>
                    @foreach ($cartLists as $list)
                        <tr class="text-center cart-list">
                            <td class="">
                                @if ($list->book->photo == null)
                                    <img src="{{ asset('storage/default.jpg') }}" class="rounded" alt="default"
                                        style="width:60px;height:80px">
                                @else
                                    <img src="{{ asset('storage/cover/' . $list->book->photo) }}" class=" rounded"
                                        alt="book cover" style="width:60px;height:80px">
                                @endif
                                <input type="hidden" value="{{ $list->book->id }}" class="bookId">
                            </td>
                            <td>{{ $list->book->title }}</td>
                            <td class=""><span class="price">{{ $list->book->price }} </span> Ks</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center quantity">
                                    <button class="btn btn-sm btn-success minus-btn"><i class="fas fa-minus"></i></button>
                                    <span class="py-1 text-center qty-val" style="width:40px">{{ $list->qty }}</span>
                                    <button class="btn btn-sm btn-success plus-btn"><i class="fas fa-plus"></i></button>
                                </div>
                            </td>
                            <td class="total-price">{{ $list->book->price * $list->qty }}</td>
                            <td>
                                <input type="hidden" id="removeId" value="{{ $list->id }}">
                                <span class="remove" style="cursor: pointer"><i
                                        class="fas fa-window-close fs-2 text-danger"></i></span>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="col-4 px-3">
                <h4><span>Cart Summary</span> <i class="fas fa-cart-arrow-down ms-3"></i></h4>
                <div class="bg-white mt-2">
                    <p class="fs-4 d-flex justify-content-between">
                        <span>Total Price</span>
                        <span class="sub-total">{{ $subTotal }} Ks</span>
                    </p>
                    <p class="fs-4 d-flex justify-content-between">
                        <span>Delivery</span>
                        <span>3000 Ks</span>
                    </p>
                    <hr style="height: 2px;">
                    <p class="fs-4 d-flex justify-content-between">
                        <span>Sub Total</span>
                        <span class="sub-deli">{{ $subTotal + 3000 }} Ks</span>
                    </p>
                </div>
                <div>
                    <div class="mt-2">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <div class="mt-2">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="mt-2">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" cols="10" rows="5" class="form-control"
                            placeholder="Enter full address"></textarea>
                        <small class="text-danger addressField d-none">The address field is required</small>
                    </div>
                    <button type="submit" class="w-100 mt-3 btn btn-lg btn-success orderBtn">Order Now</button>

                </div>
                <div>
                    <a href="{{ route('book#all') }}" class="w-100 mt-3 btn btn-lg btn-primary">Continue Shopping</a>
                    <button class="w-100 mt-3 btn btn-lg btn-danger text-white cart-clear">Clear Cart</button>
                </div>
            </div>
        @else
            <div class="text-center mt-4">
                <span class="fs-4 text-muted">No item in your cart...</span>
                <a href="{{ route('book#all') }}" class="text-decoration-none ms-2 fs-5">Shop Now <i
                        class="fas fa-angle-double-right"></i></a>
            </div>
        @endif
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.plus-btn').on('click', function() {
                $qty = $(this).closest('.quantity').find('.qty-val');
                $value = parseInt($qty.html());
                $value += 1;
                $qty.html($value);
                calculate(this);
            });

            $('.minus-btn').on('click', function() {
                $qty = $(this).closest('.quantity').find('.qty-val');
                $value = parseInt($qty.html());
                if ($value > 1) {
                    $value -= 1;
                    $qty.html($value);
                    calculate(this);
                } else {
                    return;
                }
            });

            function calculate(button) {
                $price = $(button).closest('.cart-list').find('.price').html();
                $quantity = $qty.html();
                $totalPrice = $(button).closest('.cart-list').find('.total-price');
                $totalPrice.html($price * $quantity);

                $totPri = 0;
                $('.cart-list').each(function(index, row) {
                    $prices = parseInt($(row).closest('.cart-list').find('.total-price').html());
                    $totPri += $prices;
                })
                $('.sub-total').html($totPri + ' Ks');

                $('.sub-deli').html($totPri + 3000 + ' Ks');
            }
        })
    </script>
@endsection

@section('ajax')
    <script>
        $(document).ready(function() {
            //remove cart list
            $('.remove').on('click', function() {
                $cartQty = parseInt($('.cart-qty').html());
                $list = $(this).closest('.cart-list');
                $removeId = $list.find('#removeId').val();
                $data = {
                    'cartId': $removeId
                };
                $.ajax({
                    type: 'get',
                    url: '/carts/deleteList',
                    data: $data,
                    dataType: 'json',
                    success: function(response) {
                        $list.remove();
                        $cartQty -= 1;
                        $('.cart-qty').html($cartQty);

                        if ($cartQty == 0) {
                            $text = `<div class="text-center mt-4">
                                    <span class="fs-4 text-muted">No item in your cart...</span>
                                    <a href="{{ url('/books/all') }}" class="text-decoration-none ms-2 fs-5">Shop Now <i
                                    class="fas fa-angle-double-right"></i></a>
                                    </div>`;
                            $('.data').html($text);
                        }

                        $totPri = 0;
                        $('.cart-list').each(function(index, row) {
                            $prices = parseInt($(row).closest('.cart-list').find(
                                '.total-price').html());
                            $totPri += $prices;
                        })
                        $('.sub-total').html($totPri + ' Ks');

                        $('.sub-deli').html($totPri + 3000 + ' Ks');
                    },
                    erroe: function() {
                        alert('error')
                    }
                });
            });

            //clear cart list
            $('.cart-clear').on('click', function() {
                $.ajax({
                    type: 'get',
                    url: '/carts/clear',
                    dataType: 'json',
                    success: function(response) {
                        $cartQty = 0;
                        $('.cart-qty').html($cartQty);


                        $text = `<div class="text-center mt-4">
                                    <span class="fs-4 text-muted">No item in your cart...</span>
                                    <a href="{{ url('/books/all') }}" class="text-decoration-none ms-2 fs-5">Shop Now <i
                                    class="fas fa-angle-double-right"></i></a>
                                    </div>`;
                        $('.data').html($text);

                    },
                    erroe: function() {
                        alert('error')
                    }
                });
            });

            //submit order
            $('.orderBtn').on('click', function() {
                $orders = [];

                $id = $('.userIdCode').val();
                $code = 'ebook' + $id + Math.floor(Math.random(1, 9) * 1000000);
                $address = $('#address').val();

                if ($address == '') {
                    $('.addressField').removeClass('d-none');
                    return;
                } else {
                    $('.addressField').addClass('d-none');
                }

                $('.cart-list').each(function(index, row) {
                    $orders.push({
                        'user_id': $id,
                        'book_id': $(row).find('.bookId').val(),
                        'qty': $(row).find('.qty-val').html(),
                        'total_price': $(row).find('.total-price').html(),
                        'order_code': $code,
                        'address': $address
                    });
                });

                $.ajax({
                    type: 'get',
                    url: '/carts/order',
                    data: Object.assign({}, $orders),
                    dataType: 'json',
                    success: function() {
                        $('.cart-qty').html(0);
                        window.location.href = '/orders/success';
                    }
                })


            });
        })
    </script>
@endsection
