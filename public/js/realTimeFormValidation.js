let rfidInput = document.querySelector('#rfidInput');
let result = document.querySelector('#result');
let resultCode = "";
let testAnimation = $(".Professeur");

function addListenerToInput() {

    rfidInput.addEventListener('input', function () {

        resultCode = this.value;
        if(resultCode.length < 10 )
        {
            return;
        }
        var csrf = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/make-attendance',
            type: 'POST',
            data: {'resultCode': resultCode, '_token': csrf},
            dataType: 'json',

            success: function( data ) {
                console.log(data);

            }
        });
        // console.log(resultCode);

        return;

        if(resultCode === "àé§è&§\"§éç" && resultCode.length === 10) {
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
        } else {
            // console.log('ResultCode is wrong')
            $("#result")
                .addClass("text-danger")
                .html("No match found with this code.");
        }
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
