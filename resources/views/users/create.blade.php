@extends('layouts.app')

@section('content')
<container>
    <div class=" row justify-content-center">
        <div class="col-md-8 bodyContent">
            <form action="{{route('users.store')}}" method="post">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter a name"/>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label for="idCard">Id card</label>
                    <input type="text" class="form-control" id="idCard" placeholder="">
                    <small id="emailHelp" class="form-text text-muted">Use a card unused with the card reader. This field may be completed later.</small>
                </div>

                <div class="form-group">
                    <label for="password">Choose a password</label>
                    <input type="password" id="password" class="form-control"/>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</container>
@endsection
