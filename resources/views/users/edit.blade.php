@extends('layouts.app')

@section('content')
    <div class=" row justify-content-center">
        <div class="col-md-8 bodyContent">
            <div class="col-md-6">
                <a href="{{ Route('users.index') }}">Back to the users list</a>
                <form method="post" action="{{ route('users.update', $user->id) }}" >
                    {{ csrf_field() }}
                    @method('PATCH')
                    <h4>Create a user</h4>
                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter a name"/>
                    </div>

                    <div class="form-group">
                        <label for="email">Email address*</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" placeholder="Enter email" autocomplete="off">
                    </div>

                    @if(Auth::user()->role == 'director')
                        <div class="form-group">
                            <label for="role">Role*</label>
                            <select class="form-control" name="role" id="role">
                                <option>Student</option>
                                <option>Professor</option>
                            </select>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="idCard">Id card</label>
                        <input type="text" class="form-control" value="{{ $user->idCard }}" name="idCard" id="idCard">
                        <small id="emailHelp" class="form-text text-muted">Use a card unused with the card reader. This field may be completed later.</small>
                    </div>

                    <div class="form-group">
                        <label for="password">Choose a password*</label>
                        <input type="password" name="password" value="{{ $user->password }}" id="password" class="form-control"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
