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
