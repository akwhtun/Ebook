@extends('layouts.master')

@section('title', 'User list')

@section('searchBar')
    <form method="get">
        <div class="input-group">
            <input type="search" name="searchKey" value="{{ request('searchKey') }}" class="form-control"
                placeholder="Search Users...">
            <button class="btn btn-dark"><i class="fas fa-search"></i></button>
        </div>
    </form>
@endsection

@section('content')
    <div class="container p-2">
        <div class=" bg-light shadow-sm rounded border border-3  p-4">
            <div class="d-flex justify-content-between mb-2">
                <h3>User List - {{ $users->total() }}</h3>
                @if (session('deleteAccSuccess'))
                    <div class="alert-message col-5">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span>{{ session('deleteAccSuccess') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
            </div>
            {{ $users->links() }}
            @if (count($users) > 0)
                <div class="table-responsive-lg">
                    <table class="table">
                        <tr class="text-center bg-dark text-white">
                            <th class="col-1">ID</th>
                            <th class="col-4">Profile</th>
                            <th class="col-2">Gender</th>
                            <th class="col-2">Role</th>
                            <th class="col-3">Action</th>
                        </tr>

                        @foreach ($users as $user)
                            <tr class="text-center">
                                <td>{{ $user->id }}</td>
                                <td class="d-flex justify-conent-lg-around flex-lg-row flex-column align-items-center">
                                    @if ($user->image == null)
                                        @if ($user->gender == 'Male')
                                            <img src="{{ asset('storage/default_male.jpg') }}" class="img-thumbnail"
                                                style="width: 130px;height:130px">
                                        @else
                                            <img src="{{ asset('storage/default_female.jpg') }}" class="img-thumbnail"
                                                style="width: 130px;height:130px">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/userProfile/' . $user->image) }}" class="img-thumbnail"
                                            style="width: 130px;height:130px">
                                    @endif
                                    <div class="ms-1">
                                        <p>{{ $user->name }}</p>
                                        <p>{{ $user->email }}</p>
                                    </div>
                                </td>
                                <td>{{ $user->gender }}</td>
                                <td>
                                    <p class="badge bg-primary" style="text-transform: capitalize;font-size: 14px">
                                        {{ $user->role }}</p>
                                </td>
                                @if (Auth::user()->id != $user->id)
                                    <td>
                                        <div class="d-flex flex-lg-row flex-column">
                                            <div class="dropdown open mb-1">
                                                <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                    id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Change Role
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                                    <a class="dropdown-item btn"
                                                        href="{{ route('account#changeRole', ['user', $user->id]) }}">User</a>
                                                    <a class="dropdown-item btn"
                                                        href="{{ route('account#changeRole', ['admin', $user->id]) }}">
                                                        Admin </a>
                                                </div>
                                            </div>
                                            <div class="mb-1 mx-1">
                                                @if ($user->suspend == '0')
                                                    <a href="{{ route('account#suspend', $user->id) }}"
                                                        class="btn btn-outline-success">Active</a>
                                                @else
                                                    <a href="{{ route('account#unsuspend', $user->id) }}"
                                                        class="btn btn-danger">Suspended</a>
                                                @endif
                                            </div>
                                            <a href="{{ route('account#delete', $user->id) }}"
                                                class="btn btn-outline-danger mb-1">Delete</a>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
            @else
                <div class="mt-5">
                    <p class="fs-4 text-muted text-center">There is no User...</p>
                </div>
            @endif
        </div>
    </div>
@endsection
