let message = document.querySelector('#message');
let result = document.querySelector('#result');
let resultCode = "";
let testAnimation = $(".Professeur");

message.addEventListener('input', function () {
    resultCode = this.value;

    if(resultCode === "àé§è&§\"§éç" && resultCode.length===10) {
        let colorbg = $( "body" ).css( "background-color" );
        console.log(colorbg);
        $("#result").append("Successful check-in !");
        $(".Professeur")
            .css({"background-color": colorbg,
                  "color": "white",
                  "animation": "mymove 1s 1",
                  "animation-fill-mode": "forwards"})
    }
});


function deleteData(id)
    {
        var id = id;
        var url = '{{ route("users.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteUserForm").attr('action', url);
    }

function confirmDeleteUser() {
    console.log("ConfirmDeleteUser ??")
    document.getElementById("deleteUserForm").submit();
}

// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });
//
// $(".btn-submit").click(function(e){
//
//     e.preventDefault();
//
//     var name = $("input[name=name]").val();
//     var password = $("input[name=password]").val();
//     var email = $("input[name=email]").val();
//
//     $.ajax({
//         type:'POST',
//         url:"{{ route('ajaxRequest.post') }}",
//         data:{name:name, password:password, email:email},
//         success:function(data){
//             alert(data.success);
//         }
//     });
//
// });
