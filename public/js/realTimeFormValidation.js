console.log('Hello from realTimeFormValidation.js');
let message = document.querySelector('#message');
let result = document.querySelector('#result');
let resultCode = "";

message.addEventListener('input', function () {
    result.textContent = this.value;
    resultCode = this.value;
    console.log('resultCode :', resultCode);
});
