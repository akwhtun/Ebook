@extends('layouts.master')

@section('title', 'change password')

@section('content')
    <div class="ch-bg">
        <div class="col-7 mx-auto p-2">
            <div class=" bg-light shadow-sm rounded border border-3  px-4 pb-4 pt-2 my-3">
                <div class="text-center py-1 text-dark">
                    <h4>Change Password</h4>
                </div>
                <a class="text-dark float-start" href="{{ route('admin#dashboard') }}" style="transform:translateY(-40px)">
                    <i class="fas fa-arrow-circle-left fs-5">&nbsp;<small>Back</small></i>
                </a>
                <div class="my-1 w-75 mx-auto">
                    @if (session('success'))
                        <div class="alert-message mt-1">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span>{{ session('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    @if (session('notMatch'))
                        <div class="alert-message mt-1">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span>{{ session('notMatch') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                </div>
                <form action="{{ route('adminPassword#change') }}" method="POST">
                    @csrf
                    <input type="hidden" name="userId" value="{{ $userId }}">
                    <div class="mb-3 w-75 mx-auto text-dark">
                        <label for="oldPassword">Old Password</label>
                        <input type="password" name="oldPassword"
                            class="form-control @error('oldPassword') is-invalid @enderror"
                            placeholder="Enter old password">
                        @error('oldPassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 w-75 mx-auto text-dark">
                        <label for="newPassword">New Password</label>
                        <input type="password" name="newPassword"
                            class="form-control @error('newPassword') is-invalid @enderror"
                            placeholder="Enter new password">
                        @error('newPassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 w-75 mx-auto text-dark">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" name="confirmPassword"
                            class="form-control @error('confirmPassword') is-invalid @enderror"
                            placeholder="Enter confirm password">
                        @error('confirmPassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="w-75 mx-auto">
                        <button type="submit" class="btn btn-primary w-100">Change Password <i
                                class="ms-1 fas fa-key"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/js/light-dark.js') }}"></script>
@endsection
