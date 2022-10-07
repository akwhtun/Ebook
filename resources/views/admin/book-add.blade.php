@extends('layouts.master')

@section('title', 'add book')
@section('content')
    <div class="container p-2">
        <div class=" bg-light shadow-sm rounded border border-3  p-4">
            <div class="d-flex justify-content-between mb-1">
                <h3>Add Book</h3>
                <div>
                    <a href="{{ route('book#list') }}" class="btn btn-success">Books List</a>
                </div>
            </div>
            @if (session('createSuccess'))
                <div class="alert-message mt-1">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span>{{ session('createSuccess') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <form action="{{ route('book#create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="bookTitle">Book Title</label>
                    <input type="text" name="bookTitle" class="form-control @error('bookTitle') is-invalid @enderror"
                        value="{{ old('bookTitle') }}" placeholder="Enter book's title">
                    @error('bookTitle')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="authorId">Author</label>
                    <select name="authorId" class="form-select @error('authorId') is-invalid @enderror">
                        <option value="">Choose Author</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('authorId')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="summary">Summary</label>
                    <textarea name="summary" cols="26" rows="8" class="form-control @error('summary') is-invalid @enderror"
                        placeholder="Enter book's summary">{{ old('summary') }}</textarea>
                    @error('summary')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="bookPrice">Price</label>
                    <input type="number" name="bookPrice" class="form-control @error('bookPrice') is-invalid @enderror"
                        value="{{ old('bookPrice') }}" placeholder="Enter book's price">
                    @error('bookPrice')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="bookPhoto">Book Cover</label>
                    <input type="file" name="bookPhoto" class="form-control @error('bookPhoto') is-invalid @enderror">
                    @error('bookPhoto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="pdf">PDF File</label>
                    <input type="file" name="pdf" class="form-control @error('pdf') is-invalid @enderror">
                    @error('pdf')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="categoryId">Category</label>
                    <select name="categoryId" class="form-select @error('categoryId') is-invalid @enderror">
                        <option value="">Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('categoryId')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary mt-2">Create Book</button>
                </div>
            </form>
        </div>
    </div>
@endsection
