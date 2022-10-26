@extends('layouts.master')

@section('title', 'category list')

@section('searchBar')
    <form method="get">
        <div class="input-group">
            <input type="search" name="searchKey" value="{{ request('searchKey') }}" class="form-control"
                placeholder="Search Categories...">
            <button class="btn btn-dark"><i class="fas fa-search"></i></button>
        </div>
    </form>
@endsection

@section('content')
    <div class="container p-2 mt-1">
        <div class=" bg-light shadow-sm rounded border border-3  p-4">
            <div class="d-flex justify-content-between mb-2">
                <h3>Category List - {{ $categories->total() }}</h3>
            </div>
            @if (session('createCategorySuccess'))
                <div class="alert-message">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span>{{ session('createCategorySuccess') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (session('deleteCategorySuccess'))
                <div class="alert-message">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span>{{ session('deleteCategorySuccess') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @error('categoryUpdateName')
                <div class="alert-message">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <span><i class="fas fa-exclamation-triangle text-warning"></i> Update Fail! {{ $message }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @enderror
            @if (session('updateCategorySuccess'))
                <div class="alert-message">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <span>{{ session('updateCategorySuccess') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            {{ $categories->links() }}
            @if (count($categories) > 0)
                <div class="table-responsive-lg">
                    <table class="table">

                        <tr class="d-flex justify-content-around bg-dark text-white">
                            <th class="text-center" style="flex-basis: 10%">ID</th>
                            <th class="text-center" style="flex-basis: 40%">Category</th>
                            <th class="text-center" style="flex-basis: 40%">Action</th>
                        </tr>

                        @foreach ($categories as $category)
                            <tr class="d-flex justify-content-around cat">
                                <td class="text-center" style="flex-basis: 10%">{{ $category->id }}</td>
                                <td class="text-center notEditCat" style="flex-basis: 40%">{{ $category->name }}</td>
                                <td class="text-center editCat " style="flex-basis: 83%">
                                    <form action="{{ route('category#update') }}" method="POST"
                                        class="d-flex justify-content-lg-around justify-content-between">
                                        @csrf
                                        <input type="hidden" name="categoryId" value="{{ $category->id }}">
                                        <input type="text" name="categoryUpdateName" value="{{ $category->name }}"
                                            class="form-control w-50">
                                        <div class="me-lg-5 me-0 d-flex flex-sm-row flex-column ps-5">
                                            <button type="submit"
                                                class="editBtn btn btn-success me-lg-2 mb-1">Update</button>
                                            <button type="button"
                                                class="editBtn btn btn-info cancelBtn me-lg-4 mx-1 mb-1">Cancel</button>
                                        </div>
                                    </form>
                                </td>
                                <td class="text-center button" style="flex-basis: 40%">
                                    <button type="button"
                                        class="btn btn-warning me-3 editButton notEditBtn mb-1">Edit</button>
                                    <a href="{{ route('category#delete', $category->id) }}"
                                        class="btn btn-danger notEditBtn mb-1">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @else
                <div class="mt-5">
                    <p class="fs-4 text-muted text-center">There is no Category...</p>
                </div>
            @endif
            <div class="mt-5 w-75 mx-auto">
                <form action="{{ route('category#create') }}" method="POST" class="input-group d-flex">
                    @csrf
                    <div class="w-50">
                        <input type="text" name="categoryName"
                            class="form-control @error('categoryName') is-invalid @enderror"
                            placeholder="Enter New Category...">
                        <div class="invalid-feedback">
                            @error('categoryName')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary add" style="height: 38px">Add Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
