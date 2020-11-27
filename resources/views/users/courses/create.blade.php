@extends('layouts.app')
@section('content')

    <div class=" row justify-content-center">
        <div class="col-md-8 bodyContent">
            <div class="col-md-6">
                <a href="{{ Route('index') }}">Back to the timetable</a>
                <form method="post" id="register_form">
                   
                    <h4>Register for course</h4>
                    <div class="form-group">
                        <label for="course">Course*</label>
                        <select name="course" id="course" class="form-control" onChange="getDaySchedule(this.value);">
                            <option value="select" selected>Select course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                        <p id="courseResult"></p>
                    </div>

                    <h5>Select the courses</h5>

                    <div class="container courses-container">
                   

                            <ul class="courses-checkbox-list">
                                <li>
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label courses-checkbox-label" for="exampleCheck1">Check me out</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                    <label class="form-check-label courses-checkbox-label" for="exampleCheck2">Check me out</label>
                                </li>
                                <li>
                                    <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                    <label class="form-check-label courses-checkbox-label" for="exampleCheck3">Check me out</label>
                                </li>
                            </ul>
                    </div>

                    <!-- <div class="form-group">
                        <label for="day">Day*</label>
                        <select name="day" id="day" class="form-control" onChange="getTimeSchedule(this.value)">
                            <option value="select">Select day</option>
                        </select>
                        <p id="dayResult"></p>
                    </div>

                    <div class="form-group">
                        <label for="time">Timing*</label>
                        <select name="time" id="time" class="form-control" onChange="validateTime(this.value)">
                            <option value="select">Select time</option>
                        </select>
                        <p id="timeResult"></p>
                    </div> -->
                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

    @section('scripts')
    <script type="application/javascript">
            function getDaySchedule(value){
                $("#day").html("");
                    $("#day").append(`
                        <option value="select">Select day</option>
                    `);
                    $("#time").html("");
                    $("#time").append(`
                        <option value="select">Select time</option>
                    `);
                if(value != "select")
                {
                    $("#courseResult").html("").removeClass('text-danger');
                    
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{route("course.day.schedules")}}',
                        type: 'POST',
                        data: {'course_id': value, '_token': csrf},
                        dataType: 'json',
                    
                        success: function( data ) {
                            console.log(data.schedules);

                            for(i = 0; i < data.schedules.length; i++)
                            {
                                $("#day").append(`
                                    <option value="`+ data.schedules[i].day +`">`+ data.schedules[i].day +`</option>`);
                            }
                        }       
        });
                }
                else
                {
                    $("#courseResult").html("Course is required.").addClass('text-danger');
                    return;
                }
            }

            function getTimeSchedule(value){
                $("#time").html("");
                    $("#time").append(`
                        <option value="select">Select time</option>
                    `);
                if(value != "select")
                {
                    $("#dayResult").html("").removeClass('text-danger');
                    var course_id = $("#course").val();
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{route("course.time.schedules")}}',
                        type: 'POST',
                        data: {'course_id': course_id,'day': value, '_token': csrf},
                        dataType: 'json',
                    
                        success: function( data ) {
                            console.log(data.schedules);

                            for(i = 0; i < data.schedules.length; i++)
                            {

                                $("#time").append(`
                                    <option value="`+ 
                                    data.schedules[i].start_at + "-" + data.schedules[i].end_at +`">
                                    `+ data.schedules[i].start_at + " - " + data.schedules[i].end_at +
                                    `</option>
                                `);
                            }
                        }       
        });
                }
                else
                {
                    $("#dayResult").html("Day is required.").addClass('text-danger');
                    return;
                }
            }

            function validateTime(value){
                if(value != "select")
                {
                    $("#timeResult").html("").removeClass('text-danger');
                }
                else{
                    $("#timeResult").html("Time is required.").addClass('text-danger');
                    return;
                }
            }
        $(document).ready(function(){
            
            $("#register_form").submit(function(e){
                e.preventDefault();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var course = $("#course").val();
                var day = $("#day").val();
                var time = $("#time").val();
                var user_id = $("#user_id").val();
                if(course == "select")
                {
                    course = null;
                }
                if(day == "select")
                {
                    day = null;
                }
                if(time == "select")
                {
                    time = null;
                }

                if(course == null)
                {
                    $("#courseResult").html("Course is required.").addClass('text-danger');
                    return;
                }
                if(day == null)
                {
                    $("#dayResult").html("Day is required.").addClass('text-danger');
                    return;
                }
                if(time == null)
                {
                    $("#timeResult").html("Time is required.").addClass('text-danger');
                    return;
                }

                $.ajax({
                        url: '{{route("user.course.store")}}',
                        type: 'POST',
                        data: {'course':course, 'day':day, 'time':time, 'user_id':user_id, '_token': csrf},
                        dataType: 'json',
                    
                        success: function( data ) {
                            swal("Success", "You have registered the course successfully!", "success")
                        },

                        error: function (err) {
                            if (err.status == 422) {
                               swal("Error","There is a problem while submiting the form.",'error');
                            }
                            if(err.status == 409)
                            {
                                swal("Error","You have already registered course in the same day and time.",'error');
                            }
                        }
                           
        });
                
            });
        });
    </script>
    @endsection
