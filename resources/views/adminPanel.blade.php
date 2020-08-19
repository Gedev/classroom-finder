@extends('layouts.app')

@section('breadrumb')

@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/index">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">admin panel</li>
    </ol>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>Users</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                @if($user->role == 'director')
                                    <a href="{{ route('users.index') }}">Add a student</a>
                                @endif
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
                <div class="card">
                    <div class="card-body">
                        <h4>Classrooms</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Floor</th>
                                <th scope="col">Number of seats</th>
                                <th scope="col">Has whiteboard</th>
                                <th scope="col">Has projector</th>
                            </tr>
                            </thead>
                            @foreach ($classrooms as $classroom)
                                <tr>
                                    <td>{{ $classroom->id }}</td>
                                    <td>Étage {{ $classroom->floor }}</td>
                                    <td>{{ $classroom->nb_of_seats }}</td>
                                    <td>
                                        @if ($classroom->has_whiteboard)
                                            <div class="text-success">Yes</div>
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        @if ($classroom->has_projector)
                                            <div class="text-success">Yes</div>
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
