@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h3>Add Book</h3>
            <div>
                <a href="{{ route('book#all') }}" class="btn btn-secondary me-2">Go Home</a>
                <a href="{{ route('book#list') }}" class="btn btn-success">Books List</a>
            </div>
        </div>
        @if (session('createSuccess'))
            <div class="alert-message mt-1">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('createSuccess') }}</strong>
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
                <label for="authorName">Author</label>
                <input type="text" name="authorName" class="form-control @error('authorName') is-invalid @enderror"
                    value="{{ old('authorName') }}" placeholder="Enter author's name">
                @error('authorName')
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
                <label for="category_id">Category</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary mt-2">Create Book</button>
            </div>
        </form>
    </div>
@endsection
