@extends('layouts.app')
@section('content')

    <div class=" row justify-content-center">
        <div class="col-md-8 bodyContent">
            <div class="col-md-6">
                <form method="post" id="register_form">
                   
                    <h5 style="">Select the section</h5><!-- color:#e5f8f4 -->
                    <div class="form-group">
                        <label for="section"></label>
                        <select name="section" id="section" class="form-control" onChange="getSectionCourses(this.value)">
                            @foreach($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <h5>Select the courses</h5>

                    <div class="container courses-container">
                            <ul class="courses-checkbox-list" id="courses-checkbox-list">
                            </ul>
                    </div>
                    <p id="courseResult"></p>

                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

    @section('scripts')
    <script type="application/javascript">

            function getSectionCourses(value){
                $("#courses-checkbox-list").empty();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{route("courses.against.schedule")}}',
                        type: 'POST',
                        data: {'section_id': value, '_token': csrf},
                        dataType: 'json',
                    
                        success: function( data ) {
                            console.log(data);
                            
                            for(i = 0; i < data.length; i++)
                            {
                                $("#courses-checkbox-list").append(`
                                <li>
                                    <input type="checkbox" name="courses[]" class="form-check-input" checked value="` + data[i].id +`" id="checkbox_` + data[i].id +`">
                                    <label class="form-check-label courses-checkbox-label" for="checkbox_` + data[i].id +`">`+data[i].name+`</label>
                                </li>
                                `)
                            }
                        }    
            });
            }

        $(document).ready(function(){

            var section = $("#section").val();
            getSectionCourses(section);
            
            $("#register_form").submit(function(e){
                e.preventDefault();
                if($('.form-check-input:checked').length == 0)
                {
                    alert("nothing is checked");
                    $("#courseResult").html("Atleast one course should be checked.").addClass("text-danger");
                    return;
                }
                else
                {
                    $("#courseResult").html("");
                }
                var courses = [];
                $(':checkbox:checked').each(function(i){
                    courses[i] = $(this).val();
                });
                user_id = $("#user_id").val();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                        url: '{{route("user.course.store")}}',
                        type: 'POST',
                        data: {'courses':courses, 'user_id':user_id, '_token': csrf},
                        dataType: 'json',
                    
                        success: function( data ) {
                            swal("Success", "You have added the courses successfully!", "success")
                        },

                        error: function (err) {
                            if (err.status == 422) {
                               swal("Error","There is a problem while submiting the form.",'error');
                            }
                        }
                           
        });
                
            });
        });
    </script>
    @endsection
