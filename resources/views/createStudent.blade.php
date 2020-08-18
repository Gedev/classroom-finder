@extends('layouts.app')

@section('content')
<form action="/addStudent" method="post">
    <input type = 'submit' value = "Add student"/>
</form>

@endsection
