@extends('layouts.app')

@section('content')
@endsection

@section('realTimeFormValidation')

        <div class="bodyContent justify-content-center">

            <div class="globalTitle alert-light">
                <div class="first-letter-title">A</div>
                <div class="title">ttendance</div>
            </div>
            <h5>
                You are logged as : <span class="font-weight-bold">{{ Auth::user()->name }}</span>
            </h5>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            <label for="classroomSelect" class="font-weight-bold">Select the classroom</label>
                            <select class="custom-select classroomSelect" id="classroomSelect" onChange="printClassroom(this.value);">
                                @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">
                                        {{ $classroom->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <form id="courseFormSelect">
                        <div class="form-group">
                            <label for="courseSelect" class="font-weight-bold">Select the course</label>
                            <select class="custom-select courseSelect" id="courseSelect" onChange="consoleLogDebug(this.value);">
                                <option value="" selected disabled hidden></option>
                                @foreach ($userCourses as $userCourse)
                                    <option value="{{ $userCourse->id }}">
                                        {{ $userCourse->id.". ".$userCourse->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>

            <div id="confirmBeforeShowInput">
                <div class="col-sm-12">
                    <p class="card-text">You are about to register students in the <span class="font-weight-bold">classroom</span>
                        <span class="confirmClassroom"></span> for the course <span class="confirmCourse"></span>
                    </p>

                    <p>
                        <button id="confirmAttendanceButton" type="button" class="btn btn-success" onclick="showInput();">Confirm</button>
                    </p>

                    <div id="InputRFID" class="col-sm-4 fadeIn">
                        <label for="message" class="font-weight-bold">Enter your identification code</label>
                        <input class="form-control" id="message" type="password" autocomplete="off" />
                        <small class="form-text text-muted">Please use your card with the reader to register your presence.</small>
                        <p id="result"></p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <table class="table attendance-table">
                    <thead>
                        <tr id="attendanceTable">
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>

                    <tbody id="tableInsertAfterSelect">
                    </tbody >
                </table>
            </div>
        </div>


@endsection

@section('scripts')
    <script>
        function consoleLogDebug(value) {
            $.ajax({
                type:'GET',
                url: 'getSection/'+value,
                datatype: 'json',
                data: value,

                success:function(response) {
                    var myTable = "";
                    if(response === "")
                    {
                        myTable += "<tr class=\"text-danger glowEffect\"><td>No records</td></tr>";
                    } else {
                        var obj = JSON.parse(response);

                        for(prop in obj) {
                            let item = obj[prop];
                            myTable +="<tr class=\"fadeIn\"><td>" + item.id + "</td><td>" + item.name + "</td><td>" + item.email + "</td></tr>";
                        }
                    }

                    $('#tableInsertAfterSelect')
                        .html(myTable);
                    showTable();
                    console.log("value before printCourse : ", value);
                    printCourse(value);
                }
            });
        }

        function printClassroom(value) {
            if(!isNaN(value)){
            $(".confirmClassroom")
                .addClass("p-1 text-white bg-info")
                .html(value);
                showCourseFormSelect();
            } else {
                $(".confirmClassroom")
                    .removeClass("p-1 text-white bg-info")
                    .html("");
            }

            let course = $("select.courseSelect").children("option:selected").val();
            let classroom = $("select.classroomSelect").children("option:selected").val();
            console.log("classroom : ", classroom);
            console.log("course : ", course);
            if(!isNaN(course) && !isNaN(classroom)) {
                showButton();
            }
        }

        function printCourse(value) {

            if(!isNaN(value)) {
                $(".confirmCourse")
                    .addClass("p-1 text-white bg-info")
                    .html(value)
            } else {
                $(".confirmCourse")
                    .removeClass("p-1 text-white bg-info")
                    .html("");
            }
            let course = $("select.courseSelect").children("option:selected").val();
            let classroom = $("select.classroomSelect").children("option:selected").val();

            console.log("course :", course, "classroom : ", classroom);
            if(!isNaN(course) && !isNaN(classroom)) {
                $('#confirmBeforeShowInput')
                    .addClass("fadeIn")
                    .show();
                showButton();
            }
        }

    </script>
@endsection
