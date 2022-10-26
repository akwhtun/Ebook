@extends('layouts.master')

@section('title', 'book list')

@section('searchBar')
    <form method="get">
        <div class="input-group">
            <input type="search" name="searchKey" value="{{ request('searchKey') }}" class="form-control"
                placeholder="Search Books...">
            <button class="btn btn-dark"><i class="fas fa-search"></i></button>
        </div>
    </form>
@endsection

@section('content')
    <div class="container p-2">
        <div class=" bg-light shadow-sm rounded border border-3  p-4">
            <div class="d-flex justify-content-between mb-2">
                <h3>Books List - {{ $books->total() }}</h3>
                <div>
                    <a href="{{ route('book#add') }}" class="btn btn-primary me-2">Add Book</a>
                    {{-- <a href="{{ route('book#all') }}" class="btn btn-secondary">Go Home</a> --}}
                </div>
            </div>
            @if (session('deleteSuccess'))
                <div class="alert-message">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span>{{ session('deleteSuccess') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('updateSuccess'))
                <div class="alert-message">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span>{{ session('updateSuccess') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            {{ $books->links() }}
            @if (count($books) > 0)
                <div class="table-responsive-lg">
                    <table class="table">

                        <tr class="text-center bg-dark text-white">
                            <th class="col-1">ID</th>
                            <th class="col-3">Book</th>
                            <th class="col-2">Summary</th>
                            <th class="col-2">Price</th>
                            <th class="col-1">Category</th>
                            <th class="col-1">PDF File</th>
                            <th class="col-2">Action</th>
                        </tr>

                        @foreach ($books as $book)
                            <tr class="text-center">
                                <td>{{ $book->id }}</td>
                                <td
                                    class="d-flex flex-wrap flex-lg-row flex-column justify-conent-lg-around justify-content-center align-items-center">
                                    @if ($book->photo == null)
                                        <img src="{{ asset('storage/default.jpg') }}" class="img-thumbnail" width="140px"
                                            height="230px">
                                    @else
                                        <img src="{{ asset('storage/cover/' . $book->photo) }}" class="img-thumbnail"
                                            width="140px" height="230px">
                                    @endif
                                    <div class="ms-1">
                                        <p>{{ $book->title }}</p>
                                        <p>{{ $book->author_name }}</p>
                                    </div>
                                </td>
                                <td> {{ Str::words($book->summary, 8, '...') }}</td>
                                <td><span class="text-black">{{ $book->price }}</span> kyats</td>
                                <td>{{ $book->category_name }}</td>
                                <td>{{ $book->pdf }}</td>
                                <td class="flex-lg-row flex-column justify-content-center">
                                    <a href="{{ route('book#view', $book->id) }}" class="btn btn-success mb-1">View</a>
                                    <a href="{{ route('book#edit', $book->id) }}"
                                        class="btn btn-warning mb-1 mx-1">Edit</a>
                                    <a href="{{ route('book#delete', $book->id) }}" class="btn btn-danger mb-1">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @else
                <div class="mt-5">
                    <p class="fs-4 text-muted text-center">There is no Book...</p>
                </div>
            @endif
        </div>
    </div>
@endsection
