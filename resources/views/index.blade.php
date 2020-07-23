@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4>
                Welcome to the homepage
                <a href="{{ route('welcome')}}">Return to the portal</a>
                </h4>
            </div>
        </div>
    </div>
@endsection
