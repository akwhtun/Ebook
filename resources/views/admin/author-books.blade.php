@extends('layouts.master')

@section('title', 'author books')
@section('content')
    <div class="container p-2">
        <div class=" bg-light shadow-sm rounded border border-3  p-4">
            <div class="d-flex justify-content-between mb-2 flex-lg-row flex-column">
                <p class="text-dark" onclick="history.back()" style="cursor: pointer"><i
                        class="fas fa-arrow-circle-left fs-5">&nbsp;<small>Back</small></i></p>
                <h3 class="text-dark">Written By <a href="{{ route('author#view', $author->id) }}"
                        class="text-decoration-none text-info">{{ $author->name }}</a>
                </h3>

                <h3>Total Books - {{ $books->total() }}</h3>
            </div>
            {{ $books->links() }}
            <div class="table-responsive-lg">
                <table class="table">
                    <thead>
                        <tr class="text-center bg-dark text-white">
                            <th scope="col" style="width: 4%">ID</th>
                            <th scope="col" style="width: 13%">Photo</th>
                            <th scope="col" style="width: 13%">Title</th>
                            <th scope="col" style="width: 22%">Summary</th>
                            <th scope="col" style="width: 10%">Price</th>
                            <th scope="col" style="width: 8%">Category</th>
                            <th scope="col" style="width: 8%">PDF File</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    @foreach ($books as $book)
                        <tbody>
                            <tr class="text-center">
                                <th scope="row">{{ $book->id }}</th>
                                @if ($book->photo == null)
                                    <td><img src="{{ asset('storage/default.jpg') }}" class="img-thumbnail" width="140px"
                                            height="230px"></td>
                                @else
                                    <td><img src="{{ asset('storage/cover/' . $book->photo) }}" class="img-thumbnail"
                                            width="140px" height="230px"></td>
                                @endif
                                <td>{{ $book->title }}</td>
                                <td> {{ Str::words($book->summary, 8, '...') }}</td>
                                <td>{{ $book->price }} kyats</td>
                                <td>
                                    @foreach ($categories as $category)
                                        @if ($book->category_id == $category->id)
                                            {{ $category->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $book->pdf }}</td>
                                <td class="d-flex justify-content-center flex-lg-row flex-column">
                                    <a href="{{ route('book#view', $book->id) }}" class="btn btn-success mb-1">View</a>
                                    <a href="{{ route('book#edit', $book->id) }}"
                                        class="btn btn-warning mb-1 mx-1">Edit</a>
                                    <a href="{{ route('book#delete', $book->id) }}" class="btn btn-danger mb-1">Delete</a>
                                </td>

                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
