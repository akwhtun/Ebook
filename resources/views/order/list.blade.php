@extends('layouts.user')

@section('cart')
    <form action="{{ route('cart#view', Auth::user()->name) }}" method="GET">
        <input type="hidden" name="userId" value="{{ Auth::user()->id }}" class="userIdCode">
        <button type="submit" class="border-0 bg-light text-dark">
            <div class="d-flex align-items-center">
                <i class="fas fa-shopping-cart cart"></i>
                <span
                    class="badge rounded-circle border border-secondary text-dark ms-1 cart-qty cart-count">{{ count($carts) }}</span>
            </div>
        </button>
    </form>
@endsection

@section('content')
    <div class="mt-1 mx-auto container row g-0">
        <div class="mt-2 d-flex align-items-center">
            <p class="text-dark" onclick="history.back()" style="cursor: pointer"><i
                    class="fas fa-arrow-circle-left fs-5"></i></p>
            <p class="fs-5 ms-2"><span class="text-success">{{ Auth::user()->name }}</span>'s Order</p>
        </div>
        <div class="col-12">
            <table class="w-100">
                <tr class="text-center">
                    <th class="col-2">Book</th>
                    <th class="col-2">Quantity</th>
                    <th class="col-2">Total Price</th>
                    <th class="col-3">Address</th>
                    <th class="col-2">Order Code</th>
                </tr>
                @foreach ($lists as $list)
                    <tr class="text-center">
                        <td>
                            @if ($list->book->photo == null)
                                <img src="{{ asset('storage/default.jpg') }}" class="rounded" alt="default"
                                    style="width:60px;height:80px">
                            @else
                                <img src="{{ asset('storage/cover/' . $list->book->photo) }}" class=" rounded"
                                    alt="book cover" style="width:60px;height:80px">
                            @endif
                        </td>
                        <td>{{ $list->qty }}</td>
                        <td>{{ $list->total_price }} Ks</td>
                        <td>{{ $list->address }}</td>
                        <td>{{ $list->order_code }}</td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
