@extends('layouts.user')

@if (Auth::user() != null)
    @section('cart')
        <form action="{{ route('cart#view', Auth::user()->name) }}" method="GET">
            <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
            <button type="submit" class="border-0 bg-light text-dark">
                <div class="d-flex align-items-center">
                    <i class="fas fa-shopping-cart cart"></i>
                    <span
                        class="badge rounded-circle border border-secondary text-dark ms-1 cart-qty cart-count">{{ count($carts) }}</span>
                </div>
            </button>
        </form>
    @endsection
@endif

@section('content')
    <input type="hidden" class="mode" value="@if ($mode->mode == 1) dark-mode @else light-mode @endif">
    <div class="ch-bg" style="min-height: 80vh">
        <div class=" mx-auto container card py-2 bg-light text-dark">
            <div class="py-1 ms-2 border border-0 border-bottom border-bottom-3 border-white">
                <a href="{{ route('book#detail', $bookId) }}" class="text-decoration-none text-dark"><i
                        class="fs-5 fas fa-arrow-circle-left"></i></a>
                <span class="fs-5 ms-2">
                    {{ count($comments) }}
                    Comments
                </span>
            </div>
            <div class="overflow-auto" style="height:65vh">
                @foreach ($comments as $comment)
                    <div class="shadow">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div class="">
                                    @if ($comment->user->image == null)
                                        @if ($comment->user->gender == 'Male')
                                            <img src="{{ asset('storage/default_male.jpg') }}"
                                                class="img-thumbnail rounded-circle" style="width: 40px;height:40px">
                                        @else
                                            <img src="{{ asset('storage/default_female.jpg') }}"
                                                class="img-thumbnail rounded-circle" style="width: 40px;height:40px">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/userProfile/' . $comment->user->image) }}"
                                            class="img-thumbnail rounded-circle" style="width: 40px;height:40px">
                                    @endif
                                </div>
                                <span class="ms-1">
                                    {{ $comment->user->name }}
                                </span>
                            </div>
                            <p>{{ $comment->content }}</p>
                            <div class="d-flex align-items-center">
                                @if (Auth::user() != null)
                                    @if (Auth::user()->id == $comment->user_id)
                                        <a href="{{ route('comment#delete', $comment->id) }}"
                                            class="btn btn-sm btn-warning px-2 me-5">Delete</a>
                                    @endif
                                    @if (Auth::user()->id == $comment->user_id)
                                        <a href="{{ route('comment#edit', $comment->id) }}"
                                            class="btn btn-sm btn-secondary px-3 me-5">Edit</a>
                                    @endif
                                @endif
                                <small class="text-primary">{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card-footer bg-light">
                <form action="{{ route('comment#create') }}" method="POST">
                    @csrf
                    @if (Auth::user() != null)
                        <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                    @endif
                    <input type="hidden" name="bookId" value="{{ $bookId }}">
                    <textarea name="content" cols="10" rows="3" class="form-control @error('content') is-invalid @enderror"
                        value="{{ old('content') }}" placeholder="Leave a comment..."></textarea>
                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-sm btn-primary mt-3">Add Comment</button>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/js/light-dark.js') }}"></script>
@endsection
