@extends('layouts.app')

@section('breadrumb')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Overview') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>Students</h4>
                        <a class="btn btn-primary" href="{{ Route('users.index') }}">List of students</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>Classrooms</h4>
                    <a class="btn btn-primary" href="{{ Route('classrooms.index') }}">List of Classrooms</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>Courses</h4>
                    <a class="btn btn-primary" href="">List of courses</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>Sections</h4>
                    <a class="btn btn-primary" href="">List of sections</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
