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
                </tr>
            @endforeach
        </div>
    </div>
</div>
@endsection



