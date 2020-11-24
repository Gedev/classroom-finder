@extends('layouts.app')

@section('content')
    <div class=" row justify-content-center">
        <div class="col-md-8 bodyContent">
            <div class="col-md-6">
                <form method="post" action="{{ route('classrooms.store') }}" name="createUserForm">
                    {{ csrf_field() }}
                    <h4>Create a classroom</h4>
                    <div class="form-group">
                        <label for="id">Id*</label>
                        <input type="number" class="form-control" name="id" id="id" placeholder="Example : 101"/>
                    </div>

                    <div class="form-group">
                        <label for="floor">Floor</label>
                        <input type="number" class="form-control" name="floor" id="floor" placeholder="Example : 0, 1, 2, 3,..." autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="floor">Number of seats available</label>
                        <input type="number" class="form-control" name="nb_of_seats">
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="has_whiteboard" value="1">
                        <label class="form-check-label" for="has_whiteboard">Has a whiteboard</label>
                        <small id="form_indication" class="form-text text-muted">This field may be updated later.</small>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="has_projector" value="1">
                        <label class="form-check-label" for="has_projector">Has a projector</label>
                        <small id="form_indication" class="form-text text-muted">This field may be updated later.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection


