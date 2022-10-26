@extends('layouts.master')

@section('title', 'view book')
@section('content')
    <div class="container pt-2 px-3 pb-3">
        <div class="bg-light shadow-sm rounded border border-3  p-4">
            <div>
                <a href="{{ route('book#list') }}" class="text-dark"><i
                        class="fas fa-arrow-circle-left fs-5">&nbsp;<small>Back</small></i></a>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <h5>{{ $viewBook->title }}</h5>
                <p class="mx-3 mt-2">By</p>
                <h3>{{ $viewBook->author_name }}</h3>
            </div>
            <div class="row g-0">
                <div class="col-md-5 col-12 ps-lg-5 mx-auto">
                    @if ($viewBook->photo == null)
                        <img src="{{ asset('storage/default.jpg') }}" class="img-thumbnail"
                            style="width: 340px;height:410px">
                    @else
                        <img src="{{ asset('storage/cover/' . $viewBook->photo) }}" class="img-thumbnail"
                            style="width: 400px;height:420px">
                    @endif
                </div>
                <div class="col-md-7 col-12 mx-auto">
                    <div class="text-dark p-2 ms-2 fs-5 list-group">
                        <p class="list-group-item"><i class="me-1 fas fa-calendar-day"></i> Date :
                            {{ $viewBook->created_at->format('j-F-Y') }}
                        </p>
                        <p class="list-group-item"><i class="me-1 fas fa-book"></i> Name : {{ $viewBook->title }}</p>
                        <p class="list-group-item"><i class="me-1 fas fa-pen-alt"></i> Author :
                            {{ $viewBook->author_name }}
                            Kyats
                        </p>
                        <p class="list-group-item"><i class="me-1 fas fa-money-bill"></i> Price :
                            {{ $viewBook->price }}
                            Kyats</p>
                        <p class="list-group-item"><i class="me-1 fas fa-clone"></i> Category :
                            {{ $viewBook->category_name }}
                        </p>

                        <p class="list-group-item"><i class="me-1 fas fa-file-pdf"></i> PDF File : {{ $viewBook->pdf }}
                        </p>

                    </div>
                </div>
            </div>
            <div class="mt-2 p-2 ms-md-5">
                <p><i class="fas fa-file-alt fs-5"></i>
                    <span class="ms-3" style="font-size: 17px;">{{ $viewBook->summary }} Lorem ipsum dolor, sit amet
                        consectetur
                        adipisicing elit. Animi illum enim tenetur tempore odit architecto repellendus sed praesentium,
                        harum
                        similique repudiandae ducimus quam voluptas saepe et nulla porro rerum doloribus.</span>
                </p>
            </div>
            <div class="text-end mt-2">
                <a href="{{ route('book#edit', $viewBook->id) }}" class="btn btn-dark">
                    Edit Book
                </a>
            </div>
        </div>
    </div>
@endsection
