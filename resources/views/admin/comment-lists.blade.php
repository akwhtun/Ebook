@extends('layouts.master')

@section('title', 'comment list')

@section('searchBar')
    <form method="get">
        <div class="input-group">
            <input type="search" name="searchKey" value="{{ request('searchKey') }}" class="form-control"
                placeholder="Search Comments...">
            <button class="btn btn-dark"><i class="fas fa-search"></i></button>
        </div>
    </form>
@endsection

@section('content')
    <div class="container p-2">
        <div class=" bg-light shadow-sm rounded border border-3  p-4">
            <div class="d-flex justify-content-between mb-2">
                <h3>Comment List - {{ $comments->total() }}</h3>
                @if (session('deleteComment'))
                    <div class="alert-message">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <span>{{ session('deleteComment') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
            </div>
            {{ $comments->links() }}
            @if (count($comments) > 0)
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" class="col-2">User</th>
                            <th scope="col" class="col-2">Book</th>
                            <th scope="col" class="col-4">Comment</th>
                            <th scope="col" class="col-2">Date</th>
                            <th scope="col" class="col-2">Action</th>
                        </tr>
                    </thead>
                    @foreach ($comments as $comment)
                        <tbody class="data">
                            <tr class="text-center">
                                <td>{{ $comment->user->name }}</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        @if ($comment->book_photo == null)
                                            <img src="{{ asset('storage/default.jpg') }}" class="rounded" alt="default"
                                                style="width:60px;height:80px">
                                        @else
                                            <img src="{{ asset('storage/cover/' . $comment->book->photo) }}"
                                                class=" rounded" alt="book cover" style="width:60px;height:80px">
                                        @endif
                                        <span>{{ $comment->book_title }}</span>
                                    </div>
                                </td>
                                <td>{{ Str::words($comment->content, 10, '...') }}</td>
                                <td>{{ $comment->created_at->format('j-M-Y | h:m:s:A') }}</td>
                                <td>
                                    <a href="{{ route('comment#check', $comment->id) }}" class="btn btn-success">View</a>
                                    <a href="{{ route('comment#ban', $comment->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            @else
                <div class="mt-5">
                    <p class="fs-4 text-muted text-center">There is no comment...</p>
                </div>
            @endif
        </div>
    </div>
@endsection
