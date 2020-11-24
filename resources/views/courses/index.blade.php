@extends('layouts.app')

@section('content')

<div class="container">
    <div class="bodyContent row justify-content-center">
        <div class="col-md-12">
            <div class="globalTitle alert-light">
                <div class="first-letter-title">C</div>
                <div class="title">ourses</div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Id classroom</th>
                </tr>
                </thead>
                @foreach($courses as $course)
                    <tr>
                        <td>{{  $course->id}}</td>
                        <td>{{  $course->name}}</td>
                        <td>{{  $course->classroom_id}}</td>
                        <td>
                            <a href="{{ route('courses.edit',$course->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('courses.destroy', $course->id)}}" method="post" id="deleteCourseForm">
                                @csrf
                                @method('DELETE')
                                {{-- DELETE BUTTON --}}
                                <button type="button" class="btn btn-danger" onclick="deleteData({{$course->id}})" data-toggle="modal" data-target="#confirmDeleteModal<?= $course->id?>">Delete</button>

                                <!-- MODAL -->
                                <div class="modal fade" id="confirmDeleteModal<?= $course->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do you really want to delete this record? This process cannot be undone.
                                                {{ $course->id }} / {{ $course->name }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button class="btn btn-danger" type="submit" onclick="deleteCourseData()">Confirm Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- END MODAL --}}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            @if(Auth::user()->role == 'director')
                <a href="{{ route('courses.create') }}" class="btn btn-success">(+) Add a course</a>
            @endif
        </div>
    </div>
</div>
@endsection



