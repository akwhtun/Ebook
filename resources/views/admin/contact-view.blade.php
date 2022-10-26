@extends('layouts.master')

@section('title', 'Contact')


@section('content')
    <div class="container p-2">
        <div class=" bg-light shadow-sm rounded border border-3  p-4">
            <div class="d-flex align-items-center  mb-2">
                <a class="text-dark me-2" href="{{ route('contact#list') }}"><i class="fas fa-arrow-circle-left fs-5"></i></a>
                @if ($contact->status == 1)
                    <span class="text-success fs-5 ms-2"><i class="fas fa-check-circle me-1"></i> Finish Contact</span>
                @else
                    <span class="text-warning fs-5 ms-2"><i class="fas fa-exclamation-circle me-1"></i> UnFinish
                        Contact</span>
                @endif
            </div>

            <div class="px-lg-5">
                <div class="d-flex flex-lg-row flex-column align-items-center">
                    @if ($contact->user->image == null)
                        @if ($contact->user->gender == 'Female')
                            <img src="{{ asset('storage/default_female.jpg') }}" class="img-thumbnail"
                                style="width: 210px;height:220px">
                        @else
                            <img src="{{ asset('storage/default_male.jpg') }}" class="img-thumbnail"
                                style="width: 210px;height:220px">
                        @endif
                    @else
                        <img src="{{ asset('storage/userProfile/' . $contact->user->image) }}" class="img-thumbnail"
                            style="width: 210px;height:220px">
                    @endif
                    <div class="mt-lg-0 mt-4">
                        <p class="fs-5 ms-3"><i class="fas fa-user-circle"></i> Name : {{ $contact->user->name }}
                        </p>
                        <p class="fs-5 ms-3"><i class="fas fa-envelope"></i> Email : {{ $contact->user->email }}
                        </p>
                        @if ($contact->user->gender == 'Male')
                            <p class="fs-5 ms-3"><i class="fas fa-male"></i> Gender : {{ $contact->user->gender }}
                            </p>
                        @else
                            <p class="fs-5 ms-3"><i class="fas fa-femal"></i> Gender : {{ $contact->user->gender }}
                            </p>
                        @endif
                        <p class="fs-5 ms-3"><i class="fas fa-user-clock"></i> Join Date :
                            {{ $contact->user->created_at->format('j-M-Y | h:m:s:A') }}
                        </p>
                    </div>
                </div>
                <div class="py-4 d-flex flex-lg-row flex-column">
                    <p class="fs-5 text-dark col-lg-2 col-12 ms-2"><i class="fas fa-paragraph"></i> Subject : </p>
                    <p class="ms-2 fs-5 text-muted col-10">{{ $contact->subject }}</p>
                </div>
                <div class="text-end mt-2">
                    @if ($contact->status == 1)
                        <a class="btn btn-dark text-warning" href="{{ route('contact#status', [$contact->id, 0]) }}">
                            <span><i class="fas fa-exclamation-circle me-1"></i> UnMark</span>
                        </a>
                    @else
                        <a class="btn btn-dark text-success" href="{{ route('contact#status', [$contact->id, 1]) }}">
                            <span><i class="fas fa-check-circle me-1"></i> Mark As Read</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
