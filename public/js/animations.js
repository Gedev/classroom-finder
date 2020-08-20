let newData = document.querySelector('#newData');


function WriteCookie() {
    document.cookie = "newUserData = 1";
}

function ReadCookie() {
    let cookieValue = document.cookie
        .split('; ')
        .find(row => row.startsWith('newUserData'))
        .split('=')[1];
    alert(cookieValue);
}

