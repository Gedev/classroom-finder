@extends('layouts.app')

@section('content')
    <div class="bodyContent justify-content-center">
        <div class="globalTitle alert-light">
            <div class="first-letter-title">A</div>
            <div class="title">nnouncements</div>
        </div>

        @if (Route::has('login'))
            @auth
                @if(Auth::user()->role=='professor' || Auth::user()->role=='director')

        <form id="annoucementForm">
            {{ csrf_field() }}
            @method('POST')

            <div class="form-group">
                <label for="announcementMessage"></label>
                <input type="text" class="form-control" name="message" id="announcementMessage" placeholder="Type your message" required="">
            </div>

            <button type="submit" class="btn btn-primary submitAnnouncement">Add an annoucement</button>
        </form>
        <hr>
                @endif
            @endauth
        @endif


        @foreach ($announcements as $announcement)
            <div class="card">
                <div class="card-body annoucements">
                    <div>
                        <span class="font-weight-bold">ID : </span>
                        {{ $announcement->id }}

                        <span class="font-weight-bold">Date : </span>
                        {{ $announcement->created_at}}

                        @if (Route::has('login'))
                            @auth
                                @if(Auth::user()->role=='professor' || Auth::user()->role=='director')
                                    <form action="{{ route('announcements.destroy', $announcement->id)}}" method="post" id="deleteAnnouncementForm">
                                        @csrf
                                        @method('DELETE')
                                        {{-- DELETE BUTTON --}}
                                        <button type="button" id="deleteButtonAnnouncement" class="btn float-right" onclick="deleteData({{$announcement->id}})" data-toggle="modal" data-target="#confirmDeleteModal<?= $announcement->id?>">
                                            <i class="far fa-times-circle role_icons"></i>
                                        </button>
                    </div>
                    <span>
                        <span class="font-weight-bold">Message : </span>
                        {{ $announcement->message }}
                    </span>





                        <!-- MODAL -->
                        <div class="modal fade" id="confirmDeleteModal<?= $announcement->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete the message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Do you really want to delete this record? This process cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button class="btn btn-danger" type="submit" onclick="confirmDeleteAnnouncement()">Confirm Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END MODAL --}}
                    </form>
                            @endif
                        @endauth
                    @endif

                </div>
            </div>
        @endforeach
        <!-- MODAL -->
{{--        <div class="modal fade" id="confirmAttendanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title" id="exampleModalLabel">Do you confirm</h5>--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        You are about to register students in the classroom ... for the course ...--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Let me change</button>--}}
{{--                        <button class="btn btn-success" type="submit" onclick="showInput()" data-dismiss="modal">Confirm</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        {{-- END MODAL --}}
@endsection

@section('scripts')
            <script>
                console.log('hello ?');
                $(document).ready(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#annoucementForm').submit(function (event) {
                        console.log('click');
                        event.preventDefault();
                        event.stopPropagation();

                        let message = $('#announcementMessage').val()
                        $.ajax({
                            type:'POST',
                            url: '{{ url('storeAnnouncement') }}',
                            datatype: 'application/json',
                            data: {
                                'message': message,
                            },

                            // data: $(this).serialize(),
                            success:function(response) {
                                console.log(response);
                                if(response) {
                                    $('.success').text(response.success);
                                    $("#announcementForm").reset();
                                }
                            }
                        });
                    });
                });

            </script>
@endsection
