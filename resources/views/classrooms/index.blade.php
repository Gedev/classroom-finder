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
                        <h4>Classrooms</h4>
                            @if(Auth::user()->role == 'director')
                                <a href="{{ route('classrooms.create') }}" class="btn btn-success">(+) Add a student</a>
                            @endif
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
                                    <td>{{ $classroom->floor }}</td>
                                    <td>{{ $classroom->nb_of_seats }}</td>
                                    <td>{{ $classroom->has_whiteboard }}</td>
                                    <td>{{ $classroom->has_projector }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
