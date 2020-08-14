@extends('layouts.app')

@section('content')
@endsection

@section('realTimeFormValidation')
    <form class="col-md-4">
        <div class="form-group">
            <label for="inputGroupSelect01">Select your class</label>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>...</option>
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">
                        {{ $classroom->id }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <div>
        <label for="message">Please use your id card with the card reader</label>
        <input class="form-control" placeholder="Enter some text" id="message" type="password" />
        <p id="result"></p>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/realTimeFormValidation.js') }}" defer></script>
@endsection
