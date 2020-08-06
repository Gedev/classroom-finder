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
                        <p>
                        {{ __('You are in the user account dashboard') }}
                        </p>
                        <table>
                            <tr>
                                <td>
                                    <label for="basic-url">Votre nom est :</label>
                                    <span class="input-group-text" id="basic-addon3">
                                        {{ Auth::user()->name }}
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    <label for="basic-url">Votre email est :</label>
                                    <span class="input-group-text" id="basic-addon3">
                                                {{ Auth::user()->email }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="basic-url">Votre role est :</label>
                                    <span class="input-group-text" id="basic-addon3">
                                                {{ Auth::user()->role }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

