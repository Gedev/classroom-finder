@extends('layouts.app')

@section('content')
    <div class=" row justify-content-center">
        <div class="col-md-8 bodyContent">
            <div class="col-md-6">
                <form method="post" action="{{ route('classrooms.store') }}" name="createUserForm">
                    {{ csrf_field() }}
                    <h4>Create a classroom</h4>
                    <div class="form-group">
                        <label for="idClassroom">Id*</label>
                        <input type="number" class="form-control" name="idClassroom" id="idClassroom" placeholder="Example : 101"/>
                    </div>

                    <div class="form-group">
                        <label for="floor">Floor*</label>
                        <input type="number" class="form-control" name="floor" id="floor" placeholder="Example : 0, 1, 2, 3,..." autocomplete="off">
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="hasWhiteboard" id="hasWhiteboard" autocomplete="off">
                        <label class="form-check-label" for="hasWhiteboard">Has a whiteboard</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="hasProjector" id="hasProjector" autocomplete="off">
                        <label class="form-check-label" for="hasWhiteboard">Has a projector</label>
                    </div>

                    <button type="submit" class="btn btn-primary" onclick="WriteCookie()">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection


