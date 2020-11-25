function showInput() {
    var x = document.getElementById("InputRFID");
    x.style.display = "block";
    var inputTime = document.getElementById("InputTime");
    inputTime.style.display = "block";
    addListenerToInput();
    $("#courseSelect").attr("disabled", true);
    $("#classroomSelect").attr("disabled", true);
    $("#selectCourse").attr("disabled", true);
    $("#confirmAttendanceButton")
        .removeClass("btn-success")
        .addClass("btn-secondary")
        .attr("disabled", true);
}

function showTable() {
    var y = document.getElementById("attendanceTable");
    y.style.display = "block";
}

function showButton() {
    $('#confirmAttendanceButton').show();
}

function showCourseFormSelect() {
    $('#courseFormSelect')
        .show()
        .addClass("fadeIn");
}
