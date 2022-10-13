@extends('layouts.user')

@section('content')
    <div class="py-3  m-1 min-vh-100">
        <div class="px-3">
            <a href="{{ route('book#all') }}" class="text-dark" style="cursor: pointer"><i
                    class="fas fa-arrow-circle-left fs-5">&nbsp;<small>Back</small></i></a>
        </div>
        <div class="d-flex px-5">
            <div class="py-1 text-center" style="width: 35%">
                @if ($bookDetail->photo == null)
                    <img src="{{ asset('storage/default.jpg') }}" class="rounded img-thumbnail" alt="book cover"
                        style="width:230px;height:320px">
                @else
                    <img src="{{ asset('storage/cover/' . $bookDetail->photo) }}" class=" rounded img-thumbnail"
                        alt="book cover" style="width:230px;height:320px">
                @endif
            </div>
            <div class=" p-2" style="width: 65%">
                <p class="fs-4">{{ $bookDetail->title }}</p>
                <p>{{ $bookDetail->view }} <i class="fas fa-eye ms-1"></i></p>
                <p class="fs-4">{{ $bookDetail->price }} kyats</p>
                <p class="">{{ $bookDetail->summary }}</p>
                <div class="d-flex align-items-center">
                    <button class="btn btn-sm btn-success"><i class="fas fa-minus"></i></button>
                    <span class="py-1 text-center" style="width:40px">0</span>
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
            </div>
        </div>
        <div class="m-3 px-3 card">
            @if (count($bookDetail->comments) > 0)
                <div
                    class="d-flex justify-content-between align-items-center py-1 ms-2 border border-0 border-bottom border-bottom-3 border-white">
                    <span class="fs-5">
                        {{ count($bookDetail->comments) }}
                        Comments
                    </span>
                    @if (session('deleteSuccess'))
                        <div class="alert-message col-4">
                            <div class="alert alert-warning alert-dismissible fade show m-0 p-1" role="alert">
                                <small class="m-0 p-0">{{ session('deleteSuccess') }}</small>
                                <button type="button" class="btn-sm btn-close m-0 p-2" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    @if (session('updateSuccess'))
                        <div class="alert-message col-4">
                            <div class="alert alert-success alert-dismissible fade show m-0 p-1" role="alert">
                                <small class="m-0 p-0">{{ session('updateSuccess') }}</small>
                                <button type="button" class="btn-sm btn-close m-0 p-2" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="overflow-auto" style="max-height: 350px">
                    @foreach ($bookDetail->comments as $comment)
                        <div class="shadow-sm">
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
                                <div class="d-flex align-items-center">
                                    @if (Auth::user() != null)
                                        @if (Auth::user()->id == $comment->user_id)
                                            <a href="{{ route('comment#delete', $comment->id) }}"
                                                class="btn btn-sm btn-warning px-2 me-5">Delete</a>
                                        @endif
                                        @if (Auth::user()->id == $comment->user_id)
                                            <a href="{{ route('comment#edit', $comment->id) }}"
                                                class="btn btn-sm btn-secondary px-3 me-5">Edit</a>
                                        @endif
                                    @endif
                                    <small class="text-primary">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="card-body text-start">
                    <p class="text-muted ms-2">No Comment Yet!</p>
                </div>
            @endif
            <div class="card-footer bg-light">
                <form action="{{ route('comment#create') }}" method="POST">
                    @csrf
                    @if (Auth::user() != null)
                        <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                    @endif
                    <input type="hidden" name="bookId" value="{{ $bookDetail->id }}">
                    <textarea name="content" cols="10" rows="3" class="form-control @error('content') is-invalid @enderror"
                        value="{{ old('content') }}" placeholder="Leave a comment..."></textarea>
                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-sm btn-primary mt-3">Add Comment</button>
                </form>
            </div>
        </div>
    </div>
@endsection
