@extends('layouts.user')

@section('title', 'edit account info')

@section('cart')
    <div class="px-2 aling-items-center">
        <i class="fs-3 fas fa-smile-wink" style="color:#efef05"></i>
    </div>
@endsection


@section('content')
    <input type="hidden" class="mode" value="@if ($mode->mode == 1) dark-mode @else light-mode @endif">
    <div class="ch-bg">
        <div class="col-lg-7 col-12  mx-auto p-2">
            <div class=" bg-light shadow-sm rounded border border-3  px-4 pb-4 pt-2">
                <div class="text-center py-1 text-dark">
                    <h4>Edit Account Info</h4>
                </div>
                <p class="text-dark float-start" onclick="history.back()"
                    style="cursor: pointer; transform:translateY(-40px)">
                    <i class="fas fa-arrow-circle-left fs-5">&nbsp;<small>Back</small></i>
                </p>
                <form action="{{ route('user#update') }}" method="POST" enctype="multipart/form-data">
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
                    <div class="mb-3 w-75 mx-auto text-dark">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Enter update name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 w-75 mx-auto text-dark">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control"
                            readonly>
                    </div>
                    <div class="mb-3 w-75 mx-auto text-dark">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                            <option value="">Choose Gender</option>
                            <option value="Male" @if (Auth::user()->gender == 'Male') selected @endif>Male</option>
                            <option value="Female" @if (Auth::user()->gender == 'Female') selected @endif>Female</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 w-75 mx-auto text-dark">
                        <label for="date">Join Date</label>
                        <input type="text" name="date" value="{{ Auth::user()->created_at }}" class="form-control"
                            readonly>
                    </div>
                    <div class="w-75 mx-auto">
                        <button type="submit" class="btn btn-primary w-100">Update Info <i
                                class="ms-1 fas fa-arrow-circle-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/js/light-dark.js') }}"></script>
@endsection
