
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="bodyContent row justify-content-center">
        <div class="col-md-8">
                <a class="page-link" href="{{ Route('classrooms.index') }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo; Previous</span>
                </a>
            <form method="post" action="{{ route('classrooms.update', $classroom->id) }}" >
                {{ csrf_field() }}
                @method('PATCH')
                <h4>Edit a classroom</h4>
                <div class="form-group">
                    <label for="id">id</label>
                    <input type="text" class="form-control" name="id" id="id" min="0" value="{{ $classroom->id }}" readonly/>
                </div>

                <div class="form-group">
                    <label for="nb_of_seats">Number of seats available in the room :</label>
                    <input type="number" class="form-control" name="nb_of_seats" min="1" id="nb_of_seats" value="{{ $classroom->nb_of_seats }}" autocomplete="off">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="has_whiteboard" value="1" id="has_whiteboard">
                    <label class="form-check-label" for="has_whiteboard">
                        Whiteboard
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="has_projector" value="1" id="has_projector">
                    <label class="form-check-label" for="has_projector">
                        Projector
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
