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
        @if (count($orderLists) > 0)
            <div class="my-2 d-flex align-items-center">
                <a href="{{ route('book#all') }}" class="text-dark me-2"><i class="fas fa-arrow-circle-left fs-5"></i></a>
                <span class="fs-5"><span class="text-success">{{ Auth::user()->name }}</span>'s Order History</span>
            </div>
            <div class="col-12">
                <table class="w-100">
                    <tr class="text-center">
                        <th class="col-2">Total Fee</th>
                        <th class="col-3">Address</th>
                        <th class="col-1">Order Code</th>
                        <th class="col-3">Order Date</th>
                        <th class="col-2">Status</th>
                        <th class="col-1">View</th>
                    </tr>
                    @foreach ($orderLists as $list)
                        <tr class="text-center">
                            <td>{{ $list->total_price }} Ks</td>
                            <td>{{ $list->address }}</td>
                            <td>{{ $list->order_code }}</td>
                            <td>{{ $list->created_at->format('j-M-Y | h:m:s:A') }}</td>
                            @if ($list->status == 0)
                                <td class="text-warning"><i class="me-1 fas fa-hourglass-half"></i>Pending....</td>
                            @elseif($list->status == 1)
                                <td class="text-success"><i class="me-1 fas fa-check"></i>Success</td>
                            @else
                                <td class="text-danger"><i class="me-1 fas fa-exclamation-triangle"></i>Reject</td>
                            @endif
                            <td title="view" class="text-primary"><a href="{{ route('order#list', $list->order_code) }}">
                                    <i class="fas fa-long-arrow-alt-right fs-3"></i>
                                </a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            <div class="text-center mt-4">
                <span class="fs-4 text-muted">No history....</span>
                <a href="{{ route('book#all') }}" class="text-decoration-none fs-5  ms-2">Back<i
                        class="fas fa-angle-double-right ms-1"></i></a>
            </div>
        @endif
    </div>
@endsection
