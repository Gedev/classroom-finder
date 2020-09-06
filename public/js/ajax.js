function sectionSelect(value) {
    // let sectionIdSelected = document.getElementById("sectionSelect").value;
    console.log(value);
    $.ajax({
        type:'GET',
        url:'/getSection',
        data:'_token = <?php echo csrf_token() ?>',
        success:function(data) {
            alert('Ajax : success')
        }
    });
}


function consoleLogDebug(value) {
    console.log(value);
    $.ajax({
        type:'GET',
        url:'/getSection/{id}',
        data: value,
        success:function(response) {
            alert('Ajax : success' + " " + response);
            $('#something').html(response);
        }
    });
}
