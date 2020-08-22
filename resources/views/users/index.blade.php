@extends('layouts.app')

@section('breadrumb')

@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/index">Home</a></li>
        <li class="breadcrumb-item"><a href="/adminPanel">Admin panel</a></li>
        <li class="breadcrumb-item active" aria-current="page">List of users</li>
    </ol>
</nav>
<div class="container">
    <div class="bodyContent row justify-content-center">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <h4>Users</h4>
                @if(Auth::user()->role == 'director')
                    <a href="{{ route('users.create') }}" class="btn btn-success">(+) Add a user</a>

                @endif
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                    </thead>

                    @php $toEnd = count($users);@endphp
                    @foreach ($users as $user)
                        @if(0 === --$toEnd && $_COOKIE["newUserData"]==1)
                            <tr class="justCreated">
                        @else
                            <tr>
                        @endif
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id)}}" method="post" id="deleteUserForm">
                                        @csrf
                                        @method('DELETE')
                                        {{-- DELETE BUTTON --}}
                                        <button type="button" class="btn btn-danger" onclick="deleteData({{$user->id}})" data-toggle="modal" data-target="#confirmDeleteModal<?= $user->id?>">Delete</button>

                                        <!-- MODAL -->
                                        <div class="modal fade" id="confirmDeleteModal<?= $user->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Do you really want to delete this record? This process cannot be undone.
                                                        {{ $user->id }} / {{ $user->name }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-danger" type="submit" onclick="confirmDeleteUser()">Confirm Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- END MODAL --}}
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                </table>
                    {{ $users->links() }}
                <button class="btn btn-danger" type="submit" onclick="ReadCookie()">Check cookie</button>
            </div>
        </div>
    </div>
</div>
@endsection
