@extends('layouts.app')

@section('content')
@endsection

@section('realTimeFormValidation')
    <div class="container">
        <div class="bodyContent justify-content-center">

            <div class="alert-light">
                <div class="first-letter-title">A</div>
                <div class="title">ttendance</div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            <label for="classroomSelect" class="font-weight-bold">Select your class</label>
                            <select class="custom-select" id="classroomSelect">
                                <option selected>Select a classroom</option>
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
                    <form>
                        <div class="form-group">
                            <label for="sectionSelect" class="font-weight-bold">Select your section</label>
                            <select class="custom-select" id="sectionSelect" onChange="consoleLogDebug(this.value);">
                                <option selected>Select your section</option>
                                @foreach ($trainings as $training)
                                    <option value="{{ $training->id }}">
                                        {{ $training->id.". ".$training->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>


            <table class="table">
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
            <div id="InputRFID">
                <label for="message" class="font-weight-bold">Enter your identification code</label>
                <input class="form-control" id="message" type="password" autocomplete="off" />
                <small id="emailHelp" class="form-text text-muted">Please use your card with the reader to register your presence.</small>
                <p id="result"></p>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function consoleLogDebug(value) {
            console.log(value);
            $.ajax({
                type:'GET',
                url: 'getSection/'+value,
                datatype: 'json',
                data: value,

                success:function(response) {
                    var obj = JSON.parse(response);
                    var myTable = "";
                    for(prop in obj) {
                        let item = obj[prop];
                        myTable +="<tr class=\"fadeIn\"><td>" + item.id + "</td><td>" + item.name + "</td><td>" + item.email + "</td></tr>";

                    }
                    $('#tableInsertAfterSelect')
                        .html(myTable);

                    showInput();
                }
            });
        }
    </script>
@endsection
