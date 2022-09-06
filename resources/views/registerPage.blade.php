@extends('layouts.app')

@section('content')
    <div class="register shadow-sm rounded py-4 px-5">
        <h3 class="text-center text-primary">Register</h3>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            @error('term')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="mt-4">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                    placeholder="Enter email">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="phone">Phone</label>
                <input type="number" name="phone" class="form-control" value="{{ old('phone') }}"
                    placeholder="Enter phone">
                @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}"
                    placeholder="Enter address">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
                @error('password_confirmation')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" value="Register" class="btn btn-primary py-2 mt-4 rounded-pill w-100">
            <p class="text-center mt-3">Already have any account? <a href="{{ route('loginPage') }}"
                    class="text-black text-decoration-none">Sign
                    In</a></p>
    </div>
    </form>
    </div>
@endsection
