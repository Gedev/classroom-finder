@extends('layouts.app')

@section('content')

<div class="container">
    <div class="bodyContent row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

                <div class="globalTitle alert-light">
                    <div class="first-letter-title">C</div>
                    <div class="title">ategories</div>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}
                                <div class="collapse" id="collapse{{$category->id}}">
                                    <ul class="ul-collapse list-group-flush">
                                        @foreach ($sections as $section)
                                            @if($section->category_id === $category->id)
                                                <li class="list-group-item list-sections">
                                                    {{ $section->name }}
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <a data-toggle="collapse" href="#collapse{{$category->id}}" role="button">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-down-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

        </div>
    </div>
</div>

@endsection
