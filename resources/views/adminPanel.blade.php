@extends('layouts.app')

@section('breadrumb')

@endsection

@section('content')
<div class="container">
    <div class="bodyContent justify-content-center">
        <div class="globalTitle alert-light">
            <div class="first-letter-title">A</div>
            <div class="title">dmin Panel</div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h5 class="card-title">Sections</h5>
                        <p class="card-text text-info">TO DO</p>
                        <a class="btn btn-primary" href="{{ Route('sections.index') }}">List of sections</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">All users save in database. You can filter by Id, role, class, etc.</p>
                        <a class="btn btn-primary" href="{{ Route('users.index') }}">List of users</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <h5 class="card-title">Classrooms</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a class="btn btn-primary" href="{{ Route('classrooms.index') }}">List of Classrooms</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h5 class="card-title">Courses</h5>
                        <p class="card-text">List of the courses</p>
                        <a class="btn btn-primary" href="{{ Route('courses.index') }}">List of courses</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <h5 class="card-title ">Trainings</h5>
                        <p class="card-text">List of all trainings</p>
                        <a class="btn btn-primary" href="{{ Route('trainings.index') }}">List of trainings</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Permissions</h5>
                        <p class="card-text text-info">TO DO</p>
                        <a class="btn btn-primary" href="{{ Route('permissions') }}">Permissions</a>
                    </div>
                </div>
            </div>
        </div>

    </div> {{-- END CONTAINER --}}
</div> {{-- END BODYCONTENT --}}
@endsection
