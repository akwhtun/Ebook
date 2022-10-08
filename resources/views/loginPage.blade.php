@extends('layouts.app')

@section('content')
    <div class="login shadow-sm px-5 pt-4 pb-5 border border-1 mt-5">
        <h3 class="text-center text-primary">
            <img src="{{ asset('admin/images/logo.png') }}" alt="" width="70px">
        </h3>
        @if (session('accountSuspend'))
            <div class="alert-message">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span>{{ session('accountSuspend') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mt-4">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control py-1">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control py-1">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" value="Login" class="btn btn-primary py-2 mt-4 rounded-pill w-100">
            <div class="mt-4 d-flex justify-content-between ">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input">
                    <label class="form-check-label" for="">Remember Me?</label>
                </div>
                <div>
                    <small class=" d-block text-center">Forget Password?</small>
                </div>
            </div>
            <a href="{{ route('registerPage') }}" class="d-block btn btn-primary py-2 mt-4 rounded-pill">Create new
                account</a>
        </form>
    </div>
@endsection
