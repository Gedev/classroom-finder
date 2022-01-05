@extends('layouts.app')

@section('breadrumb')

@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/index">Home</a></li>
        <li class="breadcrumb-item"><a href="/adminPanel">Admin panel</a></li>
        <li class="breadcrumb-item active" aria-current="page">Attendance Report</li>
    </ol>
</nav>
<div class="container">
    <div class="bodyContent row justify-content-center">
        <div class="col-md-12">
            <div class="globalTitle alert-light">
                <div class="first-letter-title">A</div>
                <div class="title">ttendance Records</div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Student Name</th>
                    <th scope="col">Section</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Class Time</th>
                </tr>
                </thead>
                @foreach($attendances as $attendance)
                <tr>
                    <td>{{$attendance->user->name}}</td>
                    <td>{{$attendance->section->name}}</td>
                    <td>{{$attendance->course->name}}</td>
                    <td>{{$attendance->created_at->toDateString()}}</td>
                    <td>{{$attendance->class_time}}</td>
                </tr>
                @endforeach
            </table>
              
                
        </div>
</div>
@endsection
