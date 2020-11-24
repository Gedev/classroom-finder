@extends('layouts.app')

@section('content')

<div class="container">
    <div class="bodyContent row justify-content-center">
        <div class="col-md-8">
            <h4>Courses</h4>
            <form method="post" action="{{ route('courses.update', $course->id) }}" id="editCourseForm" name="editCourseForm">
                {{ csrf_field() }}
                @method('PATCH')
                <div class="form-group">
                    <label for="id">Id*</label>
                    <input type="number" class="form-control" name="id" id="id" value="{{ $course->id }}"/>
                </div>

                <div class="form-group">
                    <label for="name">Name*</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $course->name }}" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="classroom_id">Classroom Id associated</label>
                    <input type="text" class="form-control" name="classroom_id" id="classroom_id" value="{{ $course->classroom_id }}" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="section_id">Section Id associated</label>
                    <input type="text" class="form-control" name="section_id" id="section_id" value="{{ $course->section_id }}" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection



