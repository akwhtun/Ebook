@extends('layouts.user')

@section('content')
    <div class="container mt-3 card shadow-sm">
        <div class="card-body">
            <div class="d-flex align-items-center">
                @if ($comment->user->image == null)
                    @if ($comment->user->gender == 'Male')
                        <img src="{{ asset('storage/default_male.jpg') }}" class="img-thumbnail rounded-circle"
                            style="width: 40px;height:40px">
                    @else
                        <img src="{{ asset('storage/default_female.jpg') }}" class="img-thumbnail rounded-circle"
                            style="width: 40px;height:40px">
                    @endif
                @else
                    <img src="{{ asset('storage/userProfile/' . $comment->user->image) }}"
                        class="img-thumbnail rounded-circle" style="width: 40px;height:40px">
                @endif
                <span class="ms-1">
                    {{ $comment->user->name }}
                </span>
            </div>
            <div class="mt-1">
                <form action="{{ route('comment#update', $comment->id) }}" method="POST">
                    @csrf
                    <textarea name="content" cols="30" rows="10" class="form-control  @error('content') is-invalid @enderror"
                        placeholder="Write Update Comment...."> {{ old('content', $comment->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-sm btn-dark mt-3">Update Comment</button>
                    <button type="button" class="btn btn-sm btn-secondary px-3 ms-5 mt-3"
                        onclick="history.back()">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
