@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4>
                Homepage
                </h4>
                <a href="{{ route('welcome')}}">Return to the portal</a>
            </div>
        </div>
    </div>
@endsection
