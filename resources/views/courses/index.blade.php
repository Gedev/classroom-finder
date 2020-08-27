@extends('layouts.app')

@section('content')

<div class="container">
    <div class="bodyContent row justify-content-center">
        <div class="col-md-8">
            <h4>Courses</h4>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Id classroom</th>
                </tr>
                </thead>
                @foreach($courses as $course)
                    <tr>
                        <td>{{  $course->id}}</td>
                        <td>{{  $course->name}}</td>
                        <td>{{  $course->id_classroom}}</td>
                        <td>
                            <a href="{{ route('courses.edit',$course->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            @if(Auth::user()->role == 'director')
                <a href="{{ route('courses.create') }}" class="btn btn-success">(+) Add a course</a>
            @endif
        </div>
    </div>
</div>
@endsection



