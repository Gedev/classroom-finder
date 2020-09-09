@extends('layouts.app')

@section('content')
@endsection

@section('realTimeFormValidation')
    <div class="container">
        <div class="bodyContent row justify-content-center">
            <div class="col-md-8">
                <p>
                    <div class="alert-light">
                        <div class="first-letter-title">A</div>
                        <div class="title">ttendance</div>
                    </div>
                </p>
                <form>
                    <div class="form-group">
                        <label for="classroomSelect">Select your class</label>
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
                <form>
                    <div class="form-group">
                        <label for="sectionSelect">Select your section</label>
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
                <table class="table" id="tableInsertAfterSelect">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                    </thead>
                        <tr id="attendanceRow">
                        </tr>
                </table>
                <div id="something"></div>
                <div>
                    <label for="message">Please use your id card with the card to register your presence.</label>
                    <input class="form-control" placeholder="Enter some text" id="message" type="password" autocomplete="off" />
                    <p id="result"></p>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/realTimeFormValidation.js') }}" defer></script>
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
                    console.log("obj : ", obj);
                    for(prop in obj) {
                        var item = obj[prop];
                        console.log('prop', prop);
                        $('#attendanceRow')
                            .append(item.id + " " + item.name + " " + item.email);
                }
            }
        });
    }
    </script>
@endsection
