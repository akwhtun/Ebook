@extends('layouts.master')

@section('content')
    <div class="row flex-column flex-lg-row py-3 px-5">
        <h2 class="h5 text-info py-2">QUICK STATS</h2>
        <div class="col-4">
            <div class="card mb-3 px-3 py-4 shadow-sm rounded border-0 text-white"
                style="background: linear-gradient(#dd1568, #624fe1);">
                <div class="card-body d-flex align-items-center justify-content-evenly">
                    <h1 class="fas fa-users"></h1>
                    <div>
                        <h3 class="card-title h2">{{ count($users) }}</h3>
                        <span class="fs-5">
                            Users
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-3 px-3 py-4 shadow-sm rounded border-0 text-white"
                style="background: linear-gradient(lime, #008c52);">
                <div class="card-body d-flex align-items-center justify-content-evenly">
                    <h1 class="fas fa-shopping-cart"></h1>
                    <div>
                        <h3 class="card-title h2">{{ count($orders) }}</h3>
                        <span class="fs-5">
                            Orders
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-3 px-3 py-4 shadow-sm rounded border-0 text-white"
                style="background: linear-gradient(#1bbbff,
                #2d1780);">
                <div class="card-body d-flex align-items-center justify-content-evenly">
                    <h1 class="fas fa-list"></h1>
                    <div>
                        <h3 class="card-title h2">{{ count($contacts) }}</h3>
                        <span class="fs-5">
                            Contacts
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-3 px-3 py-4 shadow-sm rounded border-0 text-white"
                style="background: linear-gradient(#ff9292, #fa0a3e);">
                <div class="card-body d-flex align-items-center justify-content-evenly">
                    <h1 class="fas fa-book"></h1>
                    <div>
                        <h3 class="card-title h2">{{ count($books) }}</h3>
                        <span class="fs-5">
                            Books
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-3 px-3 py-4 shadow-sm rounded border-0 text-white"
                style="background: linear-gradient(#f9ff44, #c4b403);">
                <div class="card-body d-flex align-items-center justify-content-evenly">
                    <h1 class="fas fa-pen-alt"></h1>
                    <div>
                        <h3 class="card-title h2">{{ count($authors) }}</h3>
                        <span class="fs-5">
                            Authors
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-3 px-3 py-4 shadow-sm rounded border-0 text-white"
                style="background: linear-gradient(#d364ff, #950195);">
                <div class="card-body d-flex align-items-center justify-content-evenly">
                    <h1 class="fas fa-chart-bar"></h1>
                    <div>
                        <h3 class="card-title h2">{{ count($categories) }}</h3>
                        <span class="fs-5">
                            Categories
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-3 px-3 py-4 shadow-sm rounded border-0 text-white"
                style="background: linear-gradient(#05edf1, #059af7);">
                <div class="card-body d-flex align-items-center justify-content-evenly">
                    <h1 class="fas fa-comment-alt"></h1>
                    <div>
                        <h3 class="card-title h2">{{ count($comments) }}</h3>
                        <span class="fs-5">
                            Comments
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
