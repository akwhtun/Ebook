@extends('layouts.master')

@section('title', 'view author')
@section('content')
    <div class="container pt-2 px-3 pb-3">
        <div class="bg-light shadow-sm rounded border border-3  p-4">
            <div>
                <a href="{{ route('author#list') }}" class="text-decoration-none text-dark"><i
                        class="fas fa-arrow-circle-left fs-5">&nbsp;<small>Back</small></i></a>
            </div>
            <div class="row g-0 mt-2">
                <div class="col-5 ps-5 mx-auto">
                    @if ($author->photo == null)
                        <td><img src="{{ asset('storage/default_author.jpg') }}" class="img-thumbnail"
                                style="width: 340px;height:340px"></td>
                    @else
                        <td><img src="{{ asset('storage/author/' . $author->photo) }}" class="img-thumbnail" width="140px"
                                height="230px"></td>
                    @endif
                </div>
                <div class="col-7 mx-auto">
                    <div class="text-dark p-2 ms-2 fs-5 list-group">
                        <p class="list-group-item"><i class="me-1 fas fa-calendar-day"></i> Date :
                            {{ $author->created_at->format('j-F-Y') }}
                        </p>
                        <p class="list-group-item"><i class="me-1 fas fa-user-circle"></i> Name : {{ $author->name }}</p>
                        <p class="list-group-item"><i class="me-1 fas fa-sort-amount-up"></i> Age :
                            {{ $author->age }}
                        </p>
                        @if ($author->gender == 'Male')
                            <p class="list-group-item"><i class="me-1 fas fa-male"></i> Gender : {{ $author->gender }}
                            </p>
                        @else
                            <p class="list-group-item"><i class="me-1 fas fa-female"></i> Gender : {{ $author->gender }}
                            </p>
                        @endif

                    </div>
                </div>
            </div>
            <div class="text-end mt-2">
                <a href="{{ route('author#edit', $author->id) }}" class="btn btn-dark">
                    Edit Author
                </a>
            </div>
        </div>
    </div>
@endsection
