@extends('layouts.master')

@section('title', 'view')
@section('content')
    <div class="container pt-2 px-3 pb-3">
        <div class="bg-light shadow-sm rounded border border-3  p-4">
            <div>
                <a href="{{ route('book#list') }}" class="text-decoration-none text-dark"><i
                        class="fas fa-arrow-circle-left fs-5">&nbsp;<small>Back</small></i></a>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <h5>{{ $viewBook->title }}</h5>
                <p class="mx-3 mt-2">By</p>
                <h3>{{ $viewBook->author_name }}</h3>
            </div>
            <div class="d-flex justify-content-center mt-1">
                <p class="bg-dark text-white rounded p-2">Price : {{ $viewBook->price }} Kyats</p>
                <p class="bg-dark text-white mx-3 rounded p-2">Category : {{ $viewBook->category_name }}</p>
                <p class="bg-dark text-white rounded p-2">Date : {{ $viewBook->created_at->format('j-F-Y | h:m:s:a') }}</p>
            </div>
            <div class="text-center">
                @if ($viewBook->photo == null)
                    <img src="{{ asset('storage/default.jpg') }}" class="img-thumbnail" style="width: 370px;height:430px">
                @else
                    <img src="{{ asset('storage/cover/' . $viewBook->photo) }}" class="img-thumbnail"
                        style="width: 400px;height:420px">
                @endif
                </divbg-light>
                <div class="d-flex justify-content-center mt-2">
                    <strong>PDF File : </strong>
                    <p class="ms-2">{{ $viewBook->pdf }}</p>
                </div>
                <div class="my-2 text-center">
                    <p>{{ $viewBook->summary }}</p>
                </div>
            </div>
            <div class="text-end">
                <a href="{{ route('book#edit', $viewBook->id) }}" class="btn btn-dark">
                    Edit Book
                </a>
            </div>
        </div>
    @endsection
