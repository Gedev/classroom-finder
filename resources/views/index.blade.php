@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4>
                Homepage
                </h4>
                <a href="{{ route('welcome')}}">Return to the portal</a>
                <h4>
                    Users from database :
                </h4>
                <table border = "1">
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Email</td>
                    </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
