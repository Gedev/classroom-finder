let rfidInput = document.querySelector('#rfidInput');
let result = document.querySelector('#result');
let resultCode = "";
let testAnimation = $(".Professeur");

function dateTimeCheck()
{
    var hours = $("#hours").val();
    var minutes = $("#minutes").val();
    if(hours == "" || minutes == "")
    {
        $("#timeResponse")
        .html("Please select valid date and time")
        .removeClass("text-success")
        .addClass('text-danger');
    }
    else
    {
        $("#timeResponse")
        .html("Time added sunccessfully!")
        .removeClass("text-danger")
        .addClass('text-success');

        $("#result")
        .removeClass("text-success")
        .addClass("text-danger")
        .html("Please enter card again if you have already entered it.");
        $("#rfidInput").val('');
    }
}



function addListenerToInput() {
 
    rfidInput.addEventListener('input', function () {
      
        var hours = $("#hours").val();
        var minutes = $("#minutes").val();
        if(hours == "" || minutes == "")
        {
            console.log(hours);
            $("#timeResponse").text("Please select valid date and time").addClass('text-danger');
            return;
        }
        var course_id = $("#selectCourse").val();
        var section_id = $("#courseSelect").val();
        var class_time = hours + ":" + minutes;
        resultCode = this.value;
        if(resultCode.length < 1 )
        {
            return;
        }
        var csrf = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/attendance/create',
            type: 'POST',
            data: {'section_id':section_id,'resultCode': resultCode, 'course_id': course_id, 'class_time':class_time, '_token': csrf},
            dataType: 'json',
        
            success: function( data ) {
                if(data.status == "added")
                {
                    let colorbg = $( "body" ).css( "background-color" );
                    $("#result")
                        .removeClass("text-danger")
                        .addClass("text-success")
                        .html("Successful check-in !");
        
                    $(".Professeur")
                        .css({"background-color": colorbg,
                            "color": "white",
                            "animation": "mymove 1s 1",
                            "animation-fill-mode": "forwards"})
                }
                else if(data.status == "existed")
                {
                    $("#result")
                    .addClass("text-danger")
                    .html("Attendance of this student against this date and time already existed.");
                }
                else{
                    // console.log('ResultCode is wrong')
                    $("#result")
                    .addClass("text-danger")
                    .html("No match found with this code.");
                }
        
            }       
        });
    });
}




function deleteData(id) {
        var id = id;
        var url = '{{ route("users.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteUserForm").attr('action', url);
}

function deleteCourseData(id) {
        var id = id;
        var url = '{{ route("courses.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteCourseForm").attr('action', url);
}

function confirmDeleteUser() {
    console.log("ConfirmDeleteUser ??")
    document.getElementById("deleteUserForm").submit();
}

function confirmDeleteCourse() {
    console.log("ConfirmDeleteCourse ??")
    document.getElementById("deleteCourseForm").submit();
}
