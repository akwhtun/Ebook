@extends('layouts.master')

@section('title', 'author list')
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
                        <p>{{ session('deleteAuthorSuccess') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('updateAuthorSuccess'))
                <div class="alert-message">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <p>{{ session('updateAuthorSuccess') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            {{ $authors->links() }}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="width: 5%">ID</th>
                        <th scope="col" style="width: 18%">Photo</th>
                        <th scope="col"style="width: 20%">Author Name</th>
                        <th scope="col" style="width: 13%">Age</th>
                        <th scope="col" style="width: 10%">Gender</th>
                        <th scope="col" style="width: 13%">Total Books</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @foreach ($authors as $author)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $author->id }}</th>
                            @if ($author->photo == null)
                                <td><img src="{{ asset('storage/default_author.jpg') }}" class="img-thumbnail"
                                        width="140px" height="230px"></td>
                            @else
                                <td><img src="{{ asset('storage/author/' . $author->photo) }}" class="img-thumbnail"
                                        width="140px" height="230px"></td>
                            @endif
                            <td>{{ $author->name }}</td>
                            <td class="ms-1">{{ $author->age }} years</td>
                            <td class="ms-1">{{ $author->gender }}</td>
                            <td class="ms-1">{{ $author->age }} years</td>
                            <td>
                                <a href="{{ route('author#view', $author->id) }}" class="btn btn-success">View</a>
                            </td>
                            <td>
                                <a href="{{ route('author#edit', $author->id) }}" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('author#delete', $author->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
