function showInput() {
    var x = document.getElementById("InputRFID");
    x.style.display = "block";
    addListenerToInput();
    $("#courseSelect").attr("disabled", true);
    $("#classroomSelect").attr("disabled", true);
}

function showTable() {
    var y = document.getElementById("attendanceTable");
    y.style.display = "table-row";
}

function showButton() {
    $('#confirmAttendanceButton').show();
}

function showCourseFormSelect() {
    $('#courseFormSelect')
        .show()
        .addClass("fadeIn");
}
