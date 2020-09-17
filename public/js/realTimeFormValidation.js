let message = document.querySelector('#message');
let result = document.querySelector('#result');
let resultCode = "";
let testAnimation = $(".Professeur");

message.addEventListener('input', function () {
    resultCode = this.value;

    if(resultCode === "àé§è&§\"§éç" && resultCode.length===10) {
        let colorbg = $( "body" ).css( "background-color" );
        console.log(colorbg);
        $("#result").html("Successful check-in !");
        $(".Professeur")
            .css({"background-color": colorbg,
                  "color": "white",
                  "animation": "mymove 1s 1",
                  "animation-fill-mode": "forwards"})
    }
});

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
