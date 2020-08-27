@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="bodyContent row justify-content-center">
            <div class="col-md-8">

                <form method="post" action="{{ route('courses.store') }}" name="createCourseForm">
                    {{ csrf_field() }}
                    <h4>Create a course</h4>
                    <div class="form-group">
                        <label for="id">Id*</label>
                        <input type="number" class="form-control" name="id" id="id" placeholder="Example : 1, 2, 3, ..."/>
                    </div>

                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter a name" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="id_classroom">Can you specify the Id of the room where it will be teached ?*</label>
                        <input type="number" class="form-control" name="id_classroom" id="id_classroom" placeholder="id_classroom">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
