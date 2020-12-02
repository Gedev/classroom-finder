@extends('layouts.app')

@section('breadrumb')

@endsection

@section('content')

    <div class="bodyContent justify-content-center">
        <div class="globalTitle alert-light">
            <div class="first-letter-title">A</div>
            <div class="title">dmin Panel</div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card adminPanel-card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h5 class="card-title adminPanel-card-title">
                            <img src="/img/001-categories.png" class="role_icons" alt="img_categories"> Categories
                        </h5>
                        <p class="card-text">List of categories</p>
                        <a class="btn btn-primary" href="{{ Route('categories.index') }}">List of categories</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card adminPanel-card">
                    <div class="card-body">
                        <h5 class="card-title adminPanel-card-title">
                            <img src="/img/003-users.png" class="role_icons" alt="img_users"> Users
                        </h5>
                        <p class="card-text">All users saved in database. You can filter by Id, role, class, etc.</p>
                        <a class="btn btn-primary" href="{{ Route('users.index') }}">List of users</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card adminPanel-card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <h5 class="card-title adminPanel-card-title">
                                <img src="/img/004-classrooms.png" class="role_icons" alt="img_classrooms"> Classrooms
                            </h5>
                        <p class="card-text">List of classrooms. Show if equipment (whiteboard, projector) is installed.</p>
                        <a class="btn btn-primary" href="{{ Route('classrooms.index') }}">List of Classrooms</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card adminPanel-card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h5 class="card-title adminPanel-card-title">
                            <img src="/img/005-courses.png" class="role_icons" alt="img_courses"> Courses
                        </h5>
                        <p class="card-text">List of the courses</p>
                        <a class="btn btn-primary" href="{{ Route('courses.index') }}">List of courses</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card adminPanel-card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <h5 class="card-title adminPanel-card-title">
                                <img src="/img/002-sections.png" class="adminPanel_role_icons" alt="img_sections"> Sections
                            </h5>
                        <p class="card-text">List of all sections</p>
                        <a class="btn btn-primary" href="{{ Route('sections.index') }}">List of sections</a>
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- END BODYCONTENT --}}
@endsection
