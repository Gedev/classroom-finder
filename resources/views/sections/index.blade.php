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
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="globalTitle alert-light">
                    <div class="first-letter-title">S</div>
                    <div class="title">ections</div>
                </div>
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
                            <td>{{ $section->name }}
                                <div class="collapse" id="collapse{{$section->id}}">
                                    <ul class="ul-collapse">
                                        @foreach ($courses as $course)
                                            @if($course->id_training === $section->id)
                                                <li>
                                                    {{ $course->name }}
                                                </li>
                                            @endif
                                        @endforeach

                                    </ul>
                                </div>
                            </td>
                            <td>

                                <a data-toggle="collapse" href="#collapse{{$section->id}}" role="button">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-down-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                </a>

                            </td>


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

