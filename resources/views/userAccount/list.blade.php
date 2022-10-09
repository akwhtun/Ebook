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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 5%">ID</th>
                            <th scope="col" style="width: 20%">Profile</th>
                            <th scope="col"style="width: 19%">Name</th>
                            <th scope="col" style="width: 16%">Email</th>
                            <th scope="col" style="width: 7%">Gender</th>
                            <th scope="col" style="width: 7%">Role</th>
                            <th scope="col" style="width: 36%"></th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        <tbody>
                            <tr class=>
                                <th scope="row">{{ $user->id }}</th>
                                <td>
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
                                </td>
                                <td class="ms-1">{{ $user->name }}</td>
                                <td class="ms-1">{{ $user->email }}</td>
                                <td class="ms-1">{{ $user->gender }}</td>
                                <td class="ms-1">
                                    <p class="badge bg-primary" style="text-transform: capitalize;font-size: 14px">
                                        {{ $user->role }}</p>
                                </td>
                                @if (Auth::user()->id != $user->id)
                                    <td class="ms-1">
                                        <div class="d-flex">
                                            <div class="dropdown open">
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
                                            <div>
                                                @if ($user->suspend == '0')
                                                    <a href="{{ route('account#suspend', $user->id) }}"
                                                        class="btn btn-outline-success">Active</a>
                                                @else
                                                    <a href="{{ route('account#unsuspend', $user->id) }}"
                                                        class="btn btn-danger">Suspended</a>
                                                @endif
                                            </div>
                                            <a href="{{ route('account#delete', $user->id) }}"
                                                class="btn btn-outline-danger">Delete</a>
                                        </div>
                                    </td>
                                    {{-- <td class="ms-1">
                                    <select name="" class="form-select">
                                        <option value="0" @if ($user->suspend == 1) selected @endif>Suspended
                                        </option>
                                        <option value="1" @if ($user->suspend == 0) selected @endif>Unsuspended
                                        </option>
                                    </select>
                                </td>
                                <td class="ms-1">
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td> --}}
                                @endif
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            @else
                <div class="mt-5">
                    <p class="fs-4 text-muted text-center">There is no User...</p>
                </div>
            @endif
        </div>
    </div>
@endsection
