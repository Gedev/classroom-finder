@extends('layouts.app')

@section('breadrumb')

@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/index">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">admin panel</li>
        </ol>
    </nav>
    <div class="container">
        <div class="bodyContent row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h4>Trainings</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                    </tr>
                    </thead>
                    @foreach ($sections as $section)
                        <tr>
                            <td>{{ $section->id }}</td>
                            <td>{{ $section->name }}</td>
                            <td>
                                <a href="{{ route('sections.edit', $section->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

