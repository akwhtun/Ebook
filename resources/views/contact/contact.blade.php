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
    <input type="hidden" class="mode" value="@if ($mode->mode == 1) dark-mode @else light-mode @endif">
    <div class="bg-image d-flex justify-content-end bg-light">
        <div class="col-5 me-4 p-4">
            <p class="text-dark fs-5">Contact Us</p>
            <form action="{{ route('contact#send') }}" method="POST">
                @csrf
                <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                <div class="mt-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="mt-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
                </div>
                <div class="mt-3">
                    <label for="subject">Subject</label>
                    <textarea name="subject" cols="30" rows="10"
                        class="form-control @error('subject')
                        is-invalid
                    @enderror"
                        placeholder="Enter subject....">{{ old('subject') }}</textarea>
                    @error('subject')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-dark"><i class="fas fa-paper-plane"></i> Send Message</button>
                </div>
            </form>

            <div class=" mt-4 text-white" style="position: relative;">
                <p class="border border-0 border-bottom border-bottom-3 border-dark w-100"
                    style="position: absolute; top:50%;left:50%; transform: translate(-50%, -50%)"> </p>
                <p class=" px-2" style="position: absolute; top:50%;left:50%; transform: translate(-50%, -50%)">
                    OR</p>
            </div>

            <div class="d-flex justify-content-between align-items-center flex-wrap text-white mt-5">
                <p class="fs-5">
                    <i class="fas fa-phone"></i>
                    <span class="ms-1">09-891082064</span>
                </p>
                <p class="fs-5">
                    <i class="fas fa-envelope"></i>
                    <span class="ms-1">akwhtun@gmail.com</span>
                </p>
                <p class="fs-5">
                    <i class="fas fa-map-marker-alt"></i>
                    <span class="ms-1">Myanmar, Mandalay, Myingyan</span>
                </p>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/js/light-dark.js') }}"></script>
@endsection
