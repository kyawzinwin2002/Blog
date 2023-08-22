@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Category List</h3>
                <hr>
                @if (session('message'))
                    <div class=" alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="mb-3">
                    <a href="{{ route('category.create') }}" class=" btn btn-outline-dark">Create</a>
                </div>
                <table class=" table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Actions</th>
                            <th>Updated_at</th>
                            <th>Created_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }} <br>
                                    <span class="small text-black-50">
                                        {{ Str::limit($category->description, 50, '...') }}

                                    </span>
                                </td>
                                <td>{{ $category->user?->name }}</td>
                                <td>
                                    <div class="btn-group">


                                        @can('delete', $category)
                                        <button form="categoryDeleteForm{{ $category->id }}" class=" btn btn-outline-dark">
                                            <i class=" bi bi-trash3"></i>
                                        </button>
                                        @endcan
                                        @can('update', $category)
                                        <a href="{{ route('category.edit', $category->id) }}" class=" btn btn-outline-dark">
                                            <i class=" bi bi-pencil"></i>
                                        </a>
                                        @endcan

                                    </div>

                                    <form id="categoryDeleteForm{{ $category->id }}" class=" d-inline-block"
                                        action="{{ route('category.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                                <td>
                                    <p class=" small m-0">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $category->updated_at->format('d M Y') }}
                                    </p>
                                    <p class=" small m-0">
                                        <i class=" bi bi-clock"></i>
                                        {{ $category->updated_at->format('h:i a') }}

                                    </p>
                                </td>
                                <td>
                                    <p class=" small m-0">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $category->created_at->format('d M Y') }}
                                    </p>
                                    <p class=" small m-0">
                                        <i class=" bi bi-clock"></i>
                                        {{ $category->created_at->format('h:i a') }}

                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class=" text-center">
                                    There is no record <br>
                                    <a href="{{ route('category.create') }}" class=" btn btn-primary">Create</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
