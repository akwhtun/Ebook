@extends('layouts.master')

@section('title', 'Comment')


@section('content')
    <div class="container p-2">
        <div class=" bg-light shadow-sm rounded border border-3  p-4">
            <div class="d-flex align-items-center  mb-2">
                <span class="text-dark me-2" onclick="history.back()" style="cursor: pointer"><i
                        class="fas fa-arrow-circle-left fs-5"></i></span>
            </div>

            <div class="px-5">
                <div class="d-flex align-items-center">
                    @if ($comment->book->photo == null)
                        <img src="{{ asset('storage/default.jpg') }}" class="rounded" alt="default"
                            style="width:160px;height:200px">
                    @else
                        <img src="{{ asset('storage/cover/' . $comment->book->photo) }}" class=" rounded" alt="book cover"
                            style="width:160px;height:200px">
                    @endif
                    <div>
                        <p class="fs-5 ms-3"><i class="fas fa-book-open"></i> Book Titlt : {{ $comment->book->title }}
                        </p>
                        <p class="fs-5 ms-3"><i class="fas fa-user-circle"></i> User Name : {{ $comment->user->name }}
                        </p>
                        <p class="fs-5 ms-3"><i class="fas fa-envelope"></i> User Email : {{ $comment->user->email }}
                        </p>
                    </div>
                </div>
                <div class="py-4 d-flex">
                    <p class="fs-5 text-dark col-2 ms-2"><i class="fas fa-comment"></i> Comment : </p>
                    <p class="ms-2 fs-5 text-muted col-10">{{ $comment->content }}</p>
                </div>
                <div class="text-end mt-2">
                    <a href="{{ route('comment#ban', $comment->id) }}" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection
