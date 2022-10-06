@extends('layouts.master')

@section('title', 'edit account info')
@section('content')
    <div class="col-7 mx-auto p-2">
        <div class=" bg-light shadow-sm rounded border border-3  px-4 pb-4 pt-2">
            <div class="text-center py-1">
                <h4>Edit Account Info</h4>
            </div>
            <p class="text-dark float-start" onclick="history.back()" style="cursor: pointer; transform:translateY(-40px)"><i
                    class="fas fa-arrow-circle-left fs-5">&nbsp;<small>Back</small></i></p>
            <form action="{{ route('account#update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 w-75 text-center mx-auto">
                    @if (Auth::user()->image == null)
                        @if (Auth::user()->gender == 'Female')
                            <img src="{{ asset('storage/default_female.jpg') }}" class="img-thumbnail"
                                style="width: 290px;height:310px">
                        @else
                            <img src="{{ asset('storage/default_male.jpg') }}" class="img-thumbnail"
                                style="width: 290px;height:310px">
                        @endif
                    @else
                        <img src="{{ asset('storage/userProfile/' . Auth::user()->image) }}" class="img-thumbnail"
                            style="width: 290px;height:310px">
                    @endif
                    <input type="file" name="profile" class="form-control mt-2 mx-auto w-75">
                </div>
                <div class="mb-3 w-75 mx-auto">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter update name">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 w-75 mx-auto">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" readonly>
                </div>
                <div class="mb-3 w-75 mx-auto">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}"
                        class="form-control @error('phone') is-invalid @enderror" placeholder="Enter update phone">
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 w-75 mx-auto">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="{{ old('address', Auth::user()->address) }}"
                        class="form-control @error('address') is-invalid @enderror" placeholder="Enter update address">
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- <div class="mb-3 w-75 mx-auto">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                        <option value="">Choose Gender</option>
                        <option value="Male" selected>Male</option>
                        <option value="Female" selected>Female</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}
                <div class="mb-3 w-75 mx-auto">
                    <label for="date">Join Date</label>
                    <input type="text" name="date" value="{{ Auth::user()->created_at }}" class="form-control"
                        readonly>
                </div>
                <div class="w-75 mx-auto">
                    <button type="submit" class="btn btn-dark w-100">Update Info <i
                            class="ms-1 fas fa-arrow-circle-right"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection
