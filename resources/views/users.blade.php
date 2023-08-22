@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>User List</h3>
                <hr>

                <table class=" table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>Inforamtion</th>
                            <th>Article_Count</th>
                            <th>Catgory_Count</th>
                            <th>Updated_at</th>
                            <th>Created_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }} <br>
                                    <span class="small text-black-50">
                                        {{ $user->email }}

                                    </span>
                                </td>
                                <td>{{$user->articles->count()}}</td>
                                <td>{{$user->categories->count()}}</td>

                                <td>
                                    <p class=" small m-0">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $user->updated_at->format('d M Y') }}
                                    </p>
                                    <p class=" small m-0">
                                        <i class=" bi bi-clock"></i>
                                        {{ $user->updated_at->format('h:i a') }}

                                    </p>
                                </td>
                                <td>
                                    <p class=" small m-0">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $user->created_at->format('d M Y') }}
                                    </p>
                                    <p class=" small m-0">
                                        <i class=" bi bi-clock"></i>
                                        {{ $user->created_at->format('h:i a') }}

                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class=" text-center">
                                    There is no user <br>

                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="">
                {{{$users->onEachSide(1)->links()}}}

                </div>

            </div>
        </div>
    </div>
@endsection
