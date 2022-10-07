@extends('layouts.master')

@section('title', 'add author')
@section('content')
    <div class="container p-2">
        <div class=" bg-light shadow-sm rounded border border-3  p-4">
            <div class="d-flex justify-content-between mb-2">
                <h3>Add Author</h3>
                <div>
                    <a href="{{ route('author#list') }}" class="btn btn-success">Author List</a>
                </div>
            </div>
            @if (session('createAuthorSuccess'))
                <div class="alert-message mt-1">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span>{{ session('createAuthorSuccess') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <form action="{{ route('author#create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="authorName">Author Name</label>
                    <input type="text" name="authorName" class="form-control @error('authorName') is-invalid @enderror"
                        value="{{ old('authorName') }}" placeholder="Enter author name">
                    @error('authorName')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="authorAge">Author Age</label>
                    <input type="number" name="authorAge" class="form-control @error('authorAge') is-invalid @enderror"
                        value="{{ old('authorAge') }}" placeholder="Enter author age">
                    @error('authorAge')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="authorPhoto">Author Photo</label>
                    <input type="file" name="authorPhoto"
                        class="form-control @error('authorPhoto') is-invalid @enderror">
                    @error('authorPhoto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                        <option value="">Choose Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary mt-2">Create Author</button>
                </div>
            </form>
        </div>
    </div>
@endsection
