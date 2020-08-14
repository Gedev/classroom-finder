let message = document.querySelector('#message');
let result = document.querySelector('#result');
let resultCode = "";

message.addEventListener('input', function () {
    resultCode = this.value;

    if(resultCode === "àé§è&§\"§éç" && resultCode.length===10) {
        $("#result").append("Successful check-in !");
    }
});

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
