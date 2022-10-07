@extends('layouts.app')

@section('content')
    <div class="register shadow-sm rounded pt-4 pb-5 px-5 border border-1 mt-5">
        <h3 class="text-center text-primary">
            <img src="{{ asset('admin/images/logo.png') }}" alt="" width="70px">
        </h3>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            @error('term')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="mt-4">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" placeholder="Enter name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" placeholder="Enter email">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="gender">Gender</label>
                <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                    <option value="">Choose Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @error('gender')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Enter password">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror">
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
