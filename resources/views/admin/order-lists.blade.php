@extends('layouts.master')

@section('title', 'order list')

@section('content')
    <div class="container py-2 px-3">
        <div class=" bg-light shadow-sm rounded border border-3  p-4">
            <div class="d-flex justify-content-between mb-2">
                <h3>Order List - {{ $orderLists->total() }}</h3>
            </div>
            {{ $orderLists->links() }}
            @if (count($orderLists) > 0)
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" class="col-2">Customer</th>
                            <th scope="col" class="col-2">Total Fee</th>
                            <th scope="col" class="col-2">Address</th>
                            <th scope="col" class="col-1">Order Code</th>
                            <th scope="col" class="col-2">Order Date</th>
                            <th scope="col" class="col-1">Status</th>
                            <th scope="col" class="col-2">Action</th>
                        </tr>
                    </thead>
                    @foreach ($orderLists as $order)
                        <tbody class="data">
                            <tr class="text-center">
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->total_price }} Ks</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->order_code }}</td>
                                <td>{{ $order->created_at->format('j-F-Y  h:m:s:A') }}</td>
                                <td>
                                    @if ($order->status == 0)
                                        <p><i class="fas fa-hourglass-half text-warning"></i>Pending...</p>
                                    @elseif($order->status == 1)
                                        <p><i class="fas fa-check text-success"></i>Success</p>
                                    @else
                                        <p><i class="fas fa-exclamation-triangle text-danger me-2"></i>Reject</p>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <div class="dropdown open">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Status
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                <a class="dropdown-item text-warning"
                                                    href="{{ route('order#status', [$order->id, 0]) }}">Pending</a>
                                                <a class="dropdown-item text-success"
                                                    href="{{ route('order#status', [$order->id, 1]) }}">Success</a>
                                                <a class="dropdown-item text-danger"
                                                    href="{{ route('order#status', [$order->id, 2]) }}">Reject</a>
                                            </div>
                                        </div>
                                        <a href="{{ route('order#detail', [$order->order_code, $order->status]) }}"
                                            class="btn btn-success ms-1">View</a>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    @endforeach
                </table>
            @else
                <div class="mt-5">
                    <p class="fs-4 text-muted text-center">There is no order...</p>
                </div>
            @endif
        </div>
    </div>
@endsection
