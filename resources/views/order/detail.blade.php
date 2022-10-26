@extends('layouts.master')

@section('title', 'order list detail')


@section('content')
    <div class="container p-2">
        <div class=" bg-light shadow-sm rounded border border-3  p-4">
            <div class="d-flex align-items-center  mb-2">
                <span class="text-dark me-2" onclick="history.back()" style="cursor: pointer"><i
                        class="fas fa-arrow-circle-left fs-5"></i></span>
                <h3 class="my-auto">Order List Detail - {{ $lists->total() }}</h3>
            </div>
            {{ $lists->links() }}
            <div class="row">
                <div class="col-lg-5 col-12 table-responsive-lg">
                    <table class="table">
                        <thead>
                            <tr class="bg-dark text-white text-center">
                                <th scope="col" class="col-2">Book</th>
                                <th scope="col" class="col-1">Quantity</th>
                                <th scope="col" class="col-2">Total Price</th>
                            </tr>
                        </thead>
                        @foreach ($lists as $list)
                            <tbody class="data">
                                <tr class="text-center">
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            @if ($list->book->photo == null)
                                                <img src="{{ asset('storage/default.jpg') }}" class="rounded" alt="default"
                                                    style="width:60px;height:80px">
                                            @else
                                                <img src="{{ asset('storage/cover/' . $list->book->photo) }}"
                                                    class=" rounded" alt="book cover" style="width:60px;height:80px">
                                            @endif
                                            <span>{{ $list->book->title }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $list->qty }}</td>
                                    <td>{{ $list->total_price }} ks</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="col-lg-7 col-12">
                    <div
                        class="border @if ($status == 0) border-warning
                    @elseif($status == 1)
                        border-success
                    @else
                    border-danger @endif border-4">
                        <p
                            class="@if ($status == 0) bg-warning
                    @elseif($status == 1)
                        bg-success
                    @else
                    bg-danger @endif fs-5 p-1 text-white m-0 p-0">
                            Order Detail</p>
                        <div class="d-flex align-items-center justify-content-around p-1">
                            <div class="d-none d-lg-block">
                                @if ($lists[0]->user->image == null)
                                    @if (Auth::user()->gender == 'Female')
                                        <img src="{{ asset('storage/default_female.jpg') }}"
                                            class="img-thumbnail rounded-circle" style="width: 220px;height:220px">
                                    @else
                                        <img src="{{ asset('storage/default_male.jpg') }}"
                                            class="img-thumbnail rounded-circle" style="width: 220px;height:220px">
                                    @endif
                                @else
                                    <img src="{{ asset('storage/userProfile/' . $lists[0]->user->image) }}"
                                        class="img-thumbnail rounded-circle" style="width: 220px;height:220px">
                                @endif
                            </div>
                            <div class="text-dark list-group">
                                <small class="list-group-item"><i class="me-1 fas fa-user-circle"></i> Customer :
                                    {{ $lists[0]->user->name }}
                                </small>
                                <small class="list-group-item"><i class="me-1 fas fa-map-marker-alt"></i> Address :
                                    {{ $lists[0]->address }}</small>
                                <small class="list-group-item"><i class="me-1 fas fa-money-bill-wave-alt"></i> Total Fee :
                                    {{ $totalPrice->total_price }} Ks (Include Delivery)</small>
                                <small class="list-group-item"><i class="me-1 fas fa-barcode"></i> Order Code :
                                    {{ $lists[0]->order_code }}
                                </small>
                                <small class="list-group-item"><i class="me-1 fab fa-first-order"></i> Order Status :
                                    @if ($status == 0)
                                        <span class="text-warning"><i class="me-1 fas fa-hourglass-half"></i> Pending
                                            ....</span>
                                    @elseif($status == 1)
                                        <span class="text-success"><i class="me-1 fas fa-check"></i> Success</span>
                                    @else
                                        <span class="text-danger"><i class="me-1 fas fa-exclamation-triangle"></i>
                                            Reject</span>
                                    @endif
                                </small>
                                <small class="list-group-item"><i class="me-1 fas fa-user-clock"></i>
                                    Order Date : {{ $lists[0]->user->created_at->format('j-M-Y | h:m:s:A') }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
