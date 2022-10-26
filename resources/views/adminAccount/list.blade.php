@extends('layouts.master')

@section('title', 'Admin list')

@section('searchBar')
    <form method="get">
        <div class="input-group">
            <input type="search" name="searchKey" value="{{ request('searchKey') }}" class="form-control"
                placeholder="Search Admins...">
            <button class="btn btn-dark"><i class="fas fa-search"></i></button>
        </div>
    </form>
@endsection

@section('content')
    <div class="container p-2">
        <div class=" bg-light shadow-sm rounded border border-3  p-4">
            <div class="d-flex justify-content-between mb-2">
                <h3>Admin List - {{ $admins->total() }}</h3>
                @if (session('deleteAccSuccess'))
                    <div class="alert-message col-5">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span>{{ session('deleteAccSuccess') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
            </div>
            {{ $admins->links() }}
            @if (count($admins) > 0)
                {{-- <div class="col-12">
                    <table class="w-100">
                        <tr class="bg-dark text-white text-center">
                            <th class="col-1">ID</th>
                            <th class="col-3 d-none d-lg-inline">Profile</th>
                            <th class="col-2">Name</th>
                            <th class="col-1">Email</th>
                            <th class="col-1">Gender</th>
                            <th class="col-1">Role</th>
                            <th class="col-3">Action</th>
                        </tr>
                        @foreach ($admins as $admin)
                            <tr class="text-center text-dark">
                                <th scope="row">{{ $admin->id }}</th>
                                <td class="d-none d-lg-inline">
                                    @if ($admin->image == null)
                                        @if ($admin->gender == 'Male')
                                            <img src="{{ asset('storage/default_male.jpg') }}" class="img-thumbnail"
                                                style="width: 130px;height:130px">
                                        @else
                                            <img src="{{ asset('storage/default_female.jpg') }}" class="img-thumbnail"
                                                style="width: 130px;height:130px">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/userProfile/' . $admin->image) }}" class="img-thumbnail"
                                            style="width: 130px;height:130px">
                                    @endif
                                </td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->gender }}</td>
                                <td>
                                    <p class="badge bg-success" style="text-transform: capitalize;font-size: 14px">
                                        {{ $admin->role }}</p>
                                </td>
                                @if (Auth::user()->id != $admin->id)
                                    <td class="ms-1">
                                        <div class="d-flex flex-lg-row flex-column">
                                            <div class="dropdown open mb-1">
                                                <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                    id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Change Role
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                                    <a class="dropdown-item btn"
                                                        href="{{ route('account#changeRole', ['user', $admin->id]) }}">User</a>
                                                    <a class="dropdown-item btn"
                                                        href="{{ route('account#changeRole', ['admin', $admin->id]) }}">
                                                        Admin </a>
                                                </div>
                                            </div>
                                            <div class="mb-1 mx-1">
                                                @if ($admin->suspend == '0')
                                                    <a href="{{ route('account#suspend', $admin->id) }}"
                                                        class="btn btn-outline-success">Active</a>
                                                @else
                                                    <a href="{{ route('account#unsuspend', $admin->id) }}"
                                                        class="btn btn-danger">Suspended</a>
                                                @endif
                                            </div>
                                            <a href="{{ route('account#delete', $admin->id) }}"
                                                class="btn btn-outline-danger mb-1">Delete</a>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div> --}}
                <div class="table-responsive-lg">
                    <table class="table" style="overflow-x: auto">
                        <tr class="text-center bg-dark text-white">
                            <th class="col-1">ID</th>
                            <th class="col-4">Profile</th>
                            <th class="col-2">Gender</th>
                            <th class="col-2">Role</th>
                            <th class="col-3">Action</th>
                        </tr>
                        @foreach ($admins as $admin)
                            <tr class="text-center text-dark">
                                <th>{{ $admin->id }}</th>
                                <td class="d-flex justify-conent-lg-around flex-lg-row flex-column align-items-center">
                                    @if ($admin->image == null)
                                        @if ($admin->gender == 'Male')
                                            <img src="{{ asset('storage/default_male.jpg') }}" class="img-thumbnail"
                                                style="width: 130px;height:130px">
                                        @else
                                            <img src="{{ asset('storage/default_female.jpg') }}" class="img-thumbnail"
                                                style="width: 130px;height:130px">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/userProfile/' . $admin->image) }}" class="img-thumbnail"
                                            style="width: 130px;height:130px">
                                    @endif
                                    <div class="ms-1">
                                        <p>{{ $admin->name }}</p>
                                        <p>{{ $admin->email }}</p>
                                    </div>
                                </td>
                                <td>{{ $admin->gender }}</td>
                                <td>
                                    <p class="badge bg-success" style="text-transform: capitalize;font-size: 14px">
                                        {{ $admin->role }}</p>
                                </td>
                                @if (Auth::user()->id != $admin->id)
                                    <td class="ms-1">
                                        <div class="d-flex flex-lg-row flex-column">
                                            <div class="dropdown open mb-1">
                                                <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                    id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Change Role
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                                    <a class="dropdown-item btn"
                                                        href="{{ route('account#changeRole', ['user', $admin->id]) }}">User</a>
                                                    <a class="dropdown-item btn"
                                                        href="{{ route('account#changeRole', ['admin', $admin->id]) }}">
                                                        Admin </a>
                                                </div>
                                            </div>
                                            <div class="mb-1 mx-1">
                                                @if ($admin->suspend == '0')
                                                    <a href="{{ route('account#suspend', $admin->id) }}"
                                                        class="btn btn-outline-success">Active</a>
                                                @else
                                                    <a href="{{ route('account#unsuspend', $admin->id) }}"
                                                        class="btn btn-danger">Suspended</a>
                                                @endif
                                            </div>
                                            <a href="{{ route('account#delete', $admin->id) }}"
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
                    <p class="fs-4 text-muted text-center">There is no Admin...</p>
                </div>
            @endif
        </div>
    </div>
@endsection
