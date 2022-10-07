@extends('layouts.master')

@section('title', 'edit book')
@section('content')
    <div class="container p-2">
        <div class=" bg-light shadow-sm rounded border border-3  px-4 pb-4 pt-2">
            <div class="mb-2">
                <p class="text-dark" onclick="history.back()" style="cursor: pointer"><i
                        class="fas fa-arrow-circle-left fs-5">&nbsp;<small>Back</small></i></p>
            </div>
            <div class="">
                <h3>Book Edit</h3>
            </div>
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
                    <label for="authorId">Author</label>
                    <select name="authorId" class="form-select @error('authorId') is-invalid @enderror">
                        <option value="">Choose Author</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" @if ($author->id == $editBook->author_id) selected @endif>
                                {{ $author->name }}
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
                            <img src="{{ asset('storage/default.jpg') }}" class="img-thumbnail"
                                style="width: 320px;height:380px">
                        @else
                            <img src="{{ asset('storage/cover/' . $editBook->photo) }}" class="img-thumbnail"
                                style="width: 320px;height:380px">
                        @endif
                    </div>
                    <input type="file" name="bookPhoto" class="form-control mt-1">
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
                    <label for="categoryId">Category</label>
                    <select name="categoryId" class="form-select @error('categoryId') is-invalid @enderror">
                        <option value="">Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == $editBook->category_id) selected @endif>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('categoryId')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-dark">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
