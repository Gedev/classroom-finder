@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are in the user account dashboard') }}

                        <table border = "1">
                            <tr>
                                <td>Id</td>
                                <td>Name</td>
                                <td>Email</td>
                            </tr>
                                <tr>
                                    <td>{{ Auth::user()->id }}</td>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

