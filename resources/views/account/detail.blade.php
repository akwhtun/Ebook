@extends('layouts.master')

@section('title', 'account detail')
@section('content')
    <div class="container pt-2 px-3 pb-3">
        <div class="bg-light shadow-sm rounded border border-3  p-4">
            <div class="d-flex justify-content-between align-items-start">
                <a href="#" onclick="history.back()" class="text-decoration-none text-dark"><i
                        class="fas fa-arrow-circle-left fs-5">&nbsp;<small>Back</small></i></a>
                @if (session('updateSuccess'))
                    <div class="alert-message col-5">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span>{{ session('updateSuccess') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="d-flex justify-content-center align-items-center py-1 fs-4">
                Account Info
            </div>
            <div class="row g-0">
                <div class="col-5 ps-5 mx-auto">
                    @if (Auth::user()->image == null)
                        @if (Auth::user()->gender == 'Female')
                            <img src="{{ asset('storage/default_female.jpg') }}" class="img-thumbnail"
                                style="width: 340px;height:350px">
                        @else
                            <img src="{{ asset('storage/default_male.jpg') }}" class="img-thumbnail"
                                style="width: 340px;height:350px">
                        @endif
                    @else
                        <img src="{{ asset('storage/userProfile/' . Auth::user()->image) }}" class="img-thumbnail"
                            style="width: 330px;height:350px">
                    @endif
                </div>
                <div class="col-7 mx-auto">
                    <div class="text-dark p-2 ms-2 fs-5 list-group">
                        <p class="list-group-item mt-2"><i class="me-1 fas fa-user-circle"></i> Name :
                            {{ Auth::user()->name }}
                        </p>
                        <p class="list-group-item mt-2"><i class="me-1 fas fa-envelope"></i> Email :
                            {{ Auth::user()->email }}</p>
                        @if (Auth::user()->gender == 'Male')
                            <p class="list-group-item mt-2"><i class="me-1 fas fa-male"></i> Gender :
                                {{ Auth::user()->gender }}
                            </p>
                        @else
                            <p class="list-group-item mt-2"><i class="me-1 fas fa-female"></i> Gender :
                                {{ Auth::user()->gender }}
                            </p>
                        @endif
                        <p class="list-group-item mt-2"><i class="me-1 fas fa-user-clock"></i> Join Date :
                            {{ Auth::user()->created_at }}
                        </p>

                    </div>
                </div>
            </div>
            <div class="text-end mt-2">
                <a href="{{ route('account#edit') }}" class="btn btn-dark">
                    Edit Info <i class="fas fa-user-edit ms-1"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
