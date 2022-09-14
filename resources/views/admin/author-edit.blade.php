@extends('layouts.master')

@section('title', 'edit author')
@section('content')
    <div class="container p-2">
        <div class=" bg-light shadow-sm rounded border border-3  px-4 pb-4 pt-2">
            <div class="mb-2">
                <p class="text-dark" onclick="history.back()" style="cursor: pointer"><i
                        class="fas fa-arrow-circle-left fs-5">&nbsp;<small>Back</small></i></p>
            </div>
            <div class="">
                <h3>Edit Author</h3>
            </div>
            <form action="{{ route('author#update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="authorId" value="{{ $author->id }}">
                <div class="mb-2">
                    <label for="authorName">Name</label>
                    <input type="text" name="authorName" value="{{ old('authorName', $author->name) }}"
                        class="form-control @error('authorName') is-invalid @enderror"
                        placeholder="Enter update author name">
                    @error('authorName')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="authorAge">Age</label>
                    <input type="text" name="authorAge" value="{{ old('authorAge', $author->age) }}"
                        class="form-control @error('authorAge') is-invalid @enderror" placeholder="Enter update author age">
                    @error('authorAge')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                        <option value="">Choose Author</option>
                        <option value="Male" @if ($author->gender == 'Male') selected @endif>Male</option>
                        <option value="Female" @if ($author->gender == 'Female') selected @endif>Female</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="authorPhoto">Photo</label>
                    <div>
                        @if ($author->photo == null)
                            <img src="{{ asset('storage/default_author.jpg') }}" class="img-thumbnail"
                                style="width: 360px;height:360px">
                        @else
                            <img src="{{ asset('storage/author/' . $author->photo) }}" class="img-thumbnail"
                                style="width: 360px;height:360px">
                        @endif
                    </div>
                    <input type="file" name="authorPhoto" class="form-control mt-1">
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-dark">Update Author</button>
                </div>
            </form>
        </div>
    </div>
@endsection
