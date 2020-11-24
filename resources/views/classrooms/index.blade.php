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
        <div class="bodyContent row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <div class="globalTitle alert-light">
                        <div class="first-letter-title">C</div>
                        <div class="title">lassrooms</div>
                    </div>

                    @if(Auth::user()->role == 'director')
                        <a href="{{ route('classrooms.create') }}" class="btn btn-success">(+) Add a classroom</a>
                    Add filter :
                        <a href="" class="btn btn-info">Floor</a>
                        <a href="" class="btn btn-info">Number of seats</a>
                        <a href="" class="btn btn-info">Has whiteboard</a>
                        <a href="" class="btn btn-info">Has projector</a>
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
                            @if($classroom->has_whiteboard === 1)
                                <td class="text-success">Yes</td>
                            @else
                                <td class="text-danger">No</td>
                            @endif
                            @if($classroom->has_projector === 1)
                                <td class="text-success">Yes</td>
                            @else
                                <td class="text-danger">No</td>
                            @endif
                            <td>
                                <a href="{{ route('classrooms.edit', $classroom->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
