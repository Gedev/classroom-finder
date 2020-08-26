@extends('layouts.app')

@section('content')

<div class="container">
    <div class="bodyContent row justify-content-center">
        <div class="col-md-8">
            <h4>Courses</h4>
            <form method="post" action="{{ route('courses.update', $course->id) }}" id="editCourseForm" name="editCourseForm">
                <div class="form-group">
                    <label for="id">Id*</label>
                    <input type="number" class="form-control" name="id" id="id" value="{{ $course->id }}"/>
                </div>

                <div class="form-group">
                    <label for="name">Name*</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $course->name }}" autocomplete="off">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



