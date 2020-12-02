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
            <div class="col-sm-4">
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

            <div class="col-sm-4">
                <form id="courseFormSelect">
                    <div class="form-group">
                        <label for="courseSelect" class="font-weight-bold">Select the section</label>
                        <select class="custom-select courseSelect" id="courseSelect" onChange="show_course_input(this.value);">
                            <option value="" selected disabled hidden></option>
                            @foreach ($userSections as $userSection)
                                <option value="{{ $userSection->id }}">
                                    {{ $userSection->id.". ".$userSection->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>

            <div class="col-sm-4" id="courseInput">
                <form>
                    <div class="form-group">
                        <label for="sectionSelect" class="font-weight-bold">Select the course</label>
                        <select class="custom-select sectionSelect" id="selectCourse" onChange="consoleLogDebug()">
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div id="confirmBeforeShowInput">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmAttendanceModal">Confirm</button>
                </div>
                <hr>

            </div>

            <div class="col-md-4 col-xs-4 fadeIn" id="InputRFID">



                <label for="rfidInput" class="font-weight-bold">Enter your identification code</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <img src="/img/rfid.png" class="role_icons" alt="rfid_icon">
                                </span>
                    </div>
                    <input class="form-control" id="rfidInput" type="password" autocomplete="off" />
                </div>

                <small class="form-text text-muted">Please use your card with the reader to register your presence.</small>
                <p id="result"></p>

            </div>

            <div class="col-md-3 col-xs-3 fadeIn" id="InputTime">
                <label for="any" class="font-weight-bold">Enter time</label>

                <div class="input-group">
                    <select class="form-control" id="hours" onChange="dateTimeCheck()">
                        <option value="">HH</option>
                    </select>
                    <span class="colon">:</span>
                    <select class="form-control" id="minutes" onChange="dateTimeCheck()">
                        <option value="">MM</option>
                    </select>
                </div>
                <p id="timeResponse"></p>
            </div>
        </div>

        <div id="attendanceTable" class="col-md-6">
            <label for="classroomSelect" class="font-weight-bold">List of users</label>
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>

                <tbody id="tableInsertAfterSelect">
                </tbody >
            </table>
        </div>

        <!-- MODAL -->
        <div class="modal fade" id="confirmAttendanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Do you confirm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        You are about to register students in the classroom ... for the course ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Let me change</button>
                        <button class="btn btn-success" type="submit" onclick="showInput()" data-dismiss="modal">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- END MODAL --}}


        @endsection

        @section('scripts')
            <script>

                function show_course_input(value)
                {

                    var x = document.getElementById("courseInput");
                    x.style.display = "block";
                    console.log("section Id: " + value);
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '/section/courses',
                        type: 'POST',
                        data: {'section_id': value, '_token': csrf},
                        dataType: 'json',

                        success: function( data ) {
                            for(var i = 0; i < data.length; i++) {
                                var obj = data[i];
                                $("#selectCourse").append(`
                        <option value="`+ obj.id + `">` + obj.name + `</option>
                    `);
                            }

                        }
                    });
                }
                function consoleLogDebug() {
                    var value = $("#courseSelect").val();
                    $.ajax({
                        type:'GET',
                        url: 'getSection/'+value,
                        datatype: 'json',
                        data: value,

                        success:function(response) {
                            var myTable = "";
                            console.log("response :", response);
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

                $(document).ready(function(){
                    var hours = ['00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23'];
                    var minutes = ['00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','52','53','54','55','56','57','58','59','60'];

                    for(i = 0; i < hours.length; i++)
                        $("#hours").append(`
                <option value="`+ hours[i] +`">`+ hours[i] +`</option>
            `)

                    for(i = 0; i < minutes.length; i++)
                        $("#minutes").append(`
                <option value="`+ minutes[i] +`">`+ minutes[i] + `</option>
            `)

                })

            </script>
@endsection
