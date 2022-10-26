@extends('layouts.master')

@section('title', 'author list')

@section('searchBar')
    <form method="get">
        <div class="input-group">
            <input type="search" name="searchKey" value="{{ request('searchKey') }}" class="form-control"
                placeholder="Search Authors...">
            <button class="btn btn-dark"><i class="fas fa-search"></i></button>
        </div>
    </form>
@endsection

@section('content')
    <div class="container p-2">
        <div class=" bg-light shadow-sm rounded border border-3  p-4">
            <div class="d-flex justify-content-between mb-2">
                <h3>Author List - {{ $authors->total() }}</h3>
                <div>
                    <a href="{{ route('author#add') }}" class="btn btn-primary me-2">Add Author</a>
                </div>
            </div>
            @if (session('deleteAuthorSuccess'))
                <div class="alert-message">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span>{{ session('deleteAuthorSuccess') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('updateAuthorSuccess'))
                <div class="alert-message">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <span>{{ session('updateAuthorSuccess') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            {{ $authors->links() }}

            @if (count($authors) > 0)
                <div class="table-responsive-lg">
                    <table class="table">
                        <thead>
                            <tr class="text-center bg-dark text-white">
                                <th class="col-1">ID</th>
                                <th class="col-2">Photo</th>
                                <th class="col-2">Author Name</th>
                                <th class="col-1">Age</th>
                                <th class="col-1">Gender</th>
                                <th class="col-2">Total Books</th>
                                <th class="col-3">Action</th>
                            </tr>
                        </thead>
                        @foreach ($authors as $author)
                            <tbody>
                                <tr class="text-center">
                                    <th scope="row">{{ $author->id }}</th>
                                    <td>
                                        @if ($author->photo == null)
                                            @if ($author->gender == 'Male')
                                                <img src="{{ asset('storage/author/default_male_author.jpg') }}"
                                                    class="img-thumbnail" style="width: 130px;height:130px">
                                            @else
                                                <img src="{{ asset('storage/author/default_female_author.jpg') }}"
                                                    class="img-thumbnail" style="width: 130px;height:130px">
                                            @endif
                                        @else
                                            <img src="{{ asset('storage/author/' . $author->photo) }}" class="img-thumbnail"
                                                style="width: 130px;height:130px">
                                        @endif
                                    </td>
                                    <td>{{ $author->name }}</td>
                                    <td class="ms-1">{{ $author->age }} years</td>
                                    <td class="ms-1">{{ $author->gender }}</td>
                                    <td class="ms-2">
                                        @foreach ($books as $book)
                                            @if ($book->author_id == $author->id)
                                                <a href="{{ route('author#viewBooks', $author->id) }}"
                                                    class="text-decoration-none text-info"
                                                    title="view books">{{ $book->book_count }}
                                                    books</a>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="flex-wrap justify-content-center flex-lg-row flex-column">
                                        <a href="{{ route('author#view', $author->id) }}"
                                            class="btn btn-success mb-1">View</a>
                                        <a href="{{ route('author#edit', $author->id) }}"
                                            class="btn btn-warning mb-1 mx-1">Edit</a>
                                        <a href="{{ route('author#delete', $author->id) }}"
                                            class="btn btn-danger mb-1">Delete</a>
                                    </td>

                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            @else
                <div class="mt-5">
                    <p class="fs-4 text-muted text-center">There is no Author...</p>
                </div>
            @endif
        </div>
    </div>
@endsection
