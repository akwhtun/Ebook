@extends('layouts.master')

@section('content')
    <div class="py-3 border border-3 m-1 min-vh-100">
        <div class="px-3">
            <p class="text-dark" onclick="history.back()" style="cursor: pointer"><i
                    class="fas fa-arrow-circle-left fs-5">&nbsp;<small>Back</small></i></p>
        </div>
        <div class="d-flex px-5">
            <div class="py-1 text-center" style="width: 35%">
                @if ($bookDetail->photo == null)
                    <img src="{{ asset('storage/default.jpg') }}" class="rounded img-thumbnail w-75" alt="default">
                @else
                    <img src="{{ asset('storage/cover/' . $bookDetail->photo) }}" class=" rounded img-thumbnail w-75"
                        alt="book cover">
                @endif
            </div>
            <div class="py-4 px-2" style="width: 65%">
                <p class="fs-4">{{ $bookDetail->title }}</p>
                <p>{{ $bookDetail->view }} <i class="fas fa-eye ms-1"></i></p>
                <p class="fs-4">{{ $bookDetail->price }} kyats</p>
                <p class="">{{ $bookDetail->summary }}</p>
                <div class="d-flex align-items-center">
                    <button class="btn btn-sm btn-success"><i class="fas fa-minus"></i></button>
                    <p class=" m-0 p-0 py-1 text-center" style="width:40px">0</p>
                    <button class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>
                    <div class="ms-1">
                        <a href="#" class=" py-1 btn btn-success d-block ms-4">
                            Add To Cart &nbsp;<i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-between">
                    <p><i class="fas fa-user fs-5 me-1"></i> {{ $bookDetail->author->name }}</p>
                    <a href="" class="text-info text-decoration-none me-3">Other Books <i
                            class="fas fa-angle-double-right"></i></a>
                </div>
                {{-- <p>{{ $bookDetail->category->name }}</p> --}}
            </div>
        </div>
        <div class="px-5 mt-2 ms-5 card">
            <p class="fs-5 border border-0 border-bottom border-bottom-3 border-dark py-2">
                {{ count($bookDetail->comments) }}
                Comments</p>
            <div class="mt-2">
                @foreach ($bookDetail->comments as $comment)
                    <div class=" shadow-sm">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div class="">
                                    @if ($comment->user->image == null)
                                        @if ($comment->user->gender == 'Male')
                                            <img src="{{ asset('storage/default_male.jpg') }}"
                                                class="img-thumbnail rounded-circle" style="width: 40px;height:40px">
                                        @else
                                            <img src="{{ asset('storage/default_female.jpg') }}"
                                                class="img-thumbnail rounded-circle" style="width: 40px;height:40px">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/userProfile/' . $comment->user->image) }}"
                                            class="img-thumbnail rounded-circle" style="width: 40px;height:40px">
                                    @endif
                                </div>
                                <span class="ms-1">
                                    {{ $comment->user->name }}
                                </span>
                            </div>
                            <p>{{ $comment->content }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- <p>{{ count($bookDetail->comments) }} comments</p>
        @foreach ($bookDetail->comments as $comment)
            <p>{{ $comment->content }} by {{ $comment->user->name }}</p>
        @endforeach --}}
    </div>
@endsection
