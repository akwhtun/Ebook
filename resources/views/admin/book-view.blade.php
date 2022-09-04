@extends('layouts.app')

@section('content')
    <div class="container p-3 border border-5">
        <div>
            <a href="{{ route('book#list') }}" class="text-decoration-none text-dark"><i
                    class="fas fa-arrow-left fs-5">&nbsp;Back</i></a>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <h5>{{ $viewBook->title }}</h5>
            <p class="mx-3 mt-2">By</p>
            <h3>{{ $viewBook->author }}</h3>
        </div>
        <div class="d-flex justify-content-center mt-1">
            <p class="bg-dark text-white rounded p-2">Price : {{ $viewBook->price }} Kyats</p>
            <p class="bg-dark text-white ms-3 rounded p-2">Category : {{ $viewBook->category->name }}</p>
        </div>
        <div class="text-center">
            @if ($viewBook->photo == null)
                <img src="{{ asset('storage/default.png') }}" class="img-thumbnail" style="width: 400px;height:420px">
            @else
                <img src="{{ asset('storage/cover/' . $viewBook->photo) }}" class="img-thumbnail"
                    style="width: 400px;height:420px">
            @endif
        </div>
        <div class="d-flex justify-content-center mt-2">
            <strong>PDF File : </strong>
            <p class="ms-2">{{ $viewBook->pdf }}</p>
        </div>
        <div class="my-2 text-center">
            <p>{{ $viewBook->summary }}</p>
        </div>
    </div>
@endsection
