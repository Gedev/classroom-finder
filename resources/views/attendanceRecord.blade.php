@extends('layouts.app')

@section('content')
@endsection

@section('realTimeFormValidation')
<div class="col-md-4">
    <form>
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
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->idCard }}</td>
            </tr>

        @endforeach
    </table>

    <div>
        <label for="message">Please use your id card with the card to register your presence.</label>
        <input class="form-control" placeholder="Enter some text" id="message" type="password" />
        <p id="result"></p>

    </div>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/realTimeFormValidation.js') }}" defer></script>
@endsection
