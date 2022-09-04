@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('book#update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="bookId" value="{{ $editBook->id }}">
            <div class="mb-2">
                <label for="bookTitle">Title</label>
                <input type="text" name="bookTitle" value="{{ old('bookTitle', $editBook->title) }}"
                    class="form-control @error('bookTitle') is-invalid @enderror" placeholder="Enter update book title">
                @error('bookTitle')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="authorName">Author</label>
                <input type="text" name="authorName" value="{{ old('authorName', $editBook->author) }}"
                    class="form-control @error('authorName') is-invalid @enderror" placeholder="Enter update author name">
                @error('authorName')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="summary">Summary</label>
                <textarea name="summary" class="form-control @error('summary') is-invalid @enderror" placeholder="Enter update summary"
                    cols="30" rows="10">{{ old('summary', $editBook->summary) }}</textarea>
                @error('summary')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="bookPrice">Price</label>
                <input type="text" name="bookPrice" value="{{ old('bookPrice', $editBook->price) }}"
                    class="form-control @error('bookPrice') is-invalid @enderror" placeholder="Enter update book price">
                @error('bookPrice')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="bookPhoto">Photo</label>
                <div>
                    @if ($editBook->photo == null)
                        <img src="{{ asset('storage/default.png') }}" class="img-thumbnail"
                            style="width: 400px;height:420px">
                    @else
                        <img src="{{ asset('storage/cover/' . $editBook->photo) }}" class="img-thumbnail"
                            style="width: 400px;height:420px">
                    @endif
                </div>
                <input type="file" name="bookPhoto" class="form-control mt-1" placeholder="Enter update book cover">
            </div>
            <div class="mb-2">
                <label for="pdf">PDF</label>
                <p>{{ $editBook->pdf }}</p>
                <input type="file" name="pdf" class="form-control @error('pdf') is-invalid @enderror"
                    placeholder="Enter update pdf file">
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
                <button type="submit" class="btn btn-dark">Update</button>
            </div>
        </form>
    </div>
@endsection
