@extends('layouts.master')

@section('title', 'contact list')

@section('content')
    <div class="container py-2 px-3">
        <div class=" bg-light shadow-sm rounded border border-3  p-4">
            <div class="d-flex justify-content-between mb-2">
                <h3>Contact List - {{ $lists->total() }}</h3>
            </div>
            {{ $lists->links() }}
            @if (count($lists) > 0)
                <table class="table">
                    <thead>
                        <tr class=" text-center">
                            <th scope="col" class="col-3">User</th>
                            <th scope="col" class="col-3">Subject</th>
                            <th scope="col" class="col-2">Date</th>
                            <th scope="col" class="col-2">Status</th>
                            <th scope="col" class="col-2">Action</th>
                        </tr>
                    </thead>
                    @foreach ($lists as $list)
                        <tbody>
                            <tr class="text-center">
                                <td>
                                    <div class="d-flex justify-content-around">
                                        @if ($list->user->image == null)
                                            @if ($list->user->gender == 'Female')
                                                <img src="{{ asset('storage/default_female.jpg') }}" class="img-thumbnail"
                                                    style="width: 50px;height:50px">
                                            @else
                                                <img src="{{ asset('storage/default_male.jpg') }}" class="img-thumbnail"
                                                    style="width: 50px;height:50px">
                                            @endif
                                        @else
                                            <img src="{{ asset('storage/userProfile/' . $list->user->image) }}"
                                                class="img-thumbnail" style="width: 50px;height:50px">
                                        @endif
                                        <div>
                                            <span> {{ Str::words($list->user->name, 4, '...') }}</span>
                                            <span> {{ Str::words($list->user->email, 1, '...') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ Str::words($list->subject, 10, '...') }}</td>
                                <td>{{ $list->created_at->format('j-M-Y | h:m:s:A') }}</td>
                                <td>
                                    @if ($list->status == 0)
                                        <p class="text-warning"><i class="fas fa-exclamation-circle"></i> UnFinish</p>
                                    @else
                                        <p class="text-success"><i class="fas fa-check-circle"></i> Finish</p>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('contact#view', $list->id) }}" class="btn btn-secondary">View</a>
                                        <div class="dropdown open ms-2">
                                            <button class="btn btn-dark dropdown-toggle" type="button" id="triggerId"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Change
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                <a class="dropdown-item text-success"
                                                    href="{{ route('contact#status', [$list->id, 1]) }}">
                                                    <span><i class="fas fa-check-circle me-1"></i> Mark As Read</span>
                                                </a>
                                                <a class="dropdown-item text-warning"
                                                    href="{{ route('contact#status', [$list->id, 0]) }}">
                                                    <span><i class="fas fa-exclamation-circle me-1"></i> UnMark</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            @else
                <div class="mt-5">
                    <p class="fs-4 text-muted text-center">There is no contact...</p>
                </div>
            @endif
        </div>
    </div>
@endsection
