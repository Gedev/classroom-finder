function classroomSelect() {
    let classroomIdSelected = document.getElementById("classroomSelect").value;
    console.log(classroomIdSelected);
    $.ajax({
        type:'GET',
        url:'/getClassroom',
        data:'_token = <?php echo csrf_token() ?>',
        success:function(data) {
            alert('Ajax : success')
        }
    });
}
