
@extends('layouts.app')

@section('content')
    <div class=" row justify-content-center">
        <div class="col-md-8 bodyContent">
            <div class="col-md-6">
                <a href="{{ Route('classrooms.index') }}">Back to the classrooms list</a>
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
                        <input type="number" class="form-control" name="nb_of_seats" min="1" id="nb_of_seats" {{ $classroom->nb_of_seats }} placeholder="Example : 0, 1, 2, 3,..." autocomplete="off">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
