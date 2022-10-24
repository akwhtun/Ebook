@extends('layouts.user')

@section('cart')
    <form action="{{ route('cart#view', Auth::user()->name) }}" method="GET">
        <input type="hidden" name="userId" value="{{ Auth::user()->id }}" class="userIdCode">
        <button type="submit" class="border-0 bg-light text-dark">
            <div class="d-flex align-items-center">
                <i class="fas fa-shopping-cart cart"></i>
                <span class="badge rounded-circle border border-secondary text-dark ms-1 cart-qty cart-count">0</span>
            </div>
        </button>
    </form>
@endsection

@section('content')
    <input type="hidden" class="mode" value="@if ($mode->mode == 1) dark-mode @else light-mode @endif">
    <div class="ch-bg" style="min-height: 80vh">
        <div class="container pt-4">
            <div class="border border-4 border-success text-dark">
                <p class="bg-success text-white p-2 m-0 p-0">Contact Success</p>
                <div class="d-flex align-items-center">
                    <span class="p-2 my-3 fs-5">
                        We Accept your message.
                        We'll Reply as soon as possible.
                        Thanks for your support.
                    </span>
                    <a href="{{ route('book#all') }}" class="text-decoration-none text-primary">Back Home <i
                            class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/js/light-dark.js') }}"></script>
@endsection
