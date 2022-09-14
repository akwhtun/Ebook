@extends('layouts.master')

@section('title', 'book list')
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
                        <strong>{{ session('deleteSuccess') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('updateSuccess'))
                <div class="alert-message">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('updateSuccess') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            {{ $books->links() }}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="width: 4%">ID</th>
                        <th scope="col" style="width: 13%">Photo</th>
                        <th scope="col" style="width: 13%">Title</th>
                        <th scope="col"style="width: 18%">Author</th>
                        <th scope="col" style="width: 25%">Summary</th>
                        <th scope="col" style="width: 6%">Price</th>
                        <th scope="col" style="width: 8%">Category</th>
                        <th scope="col" style="width: 8%">PDF File</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @foreach ($books as $book)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $book->id }}</th>
                            @if ($book->photo == null)
                                <td><img src="{{ asset('storage/default.jpg') }}" class="img-thumbnail" width="140px"
                                        height="230px"></td>
                            @else
                                <td><img src="{{ asset('storage/cover/' . $book->photo) }}" class="img-thumbnail"
                                        width="140px" height="230px"></td>
                            @endif
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author_name }}</td>
                            <td> {{ Str::words($book->summary, 8, '...') }}</td>
                            <td>{{ $book->price }} kyats</td>
                            <td>{{ $book->category_name }}</td>
                            <td>{{ $book->pdf }}</td>
                            <td>
                                <a href="{{ route('book#view', $book->id) }}" class="btn btn-success">View</a>
                            </td>
                            <td>
                                <a href="{{ route('book#edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('book#delete', $book->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
