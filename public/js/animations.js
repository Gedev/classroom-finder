let newData = document.querySelector('#newData');


function WriteCookie() {
    document.cookie = "newUserData = 1";
}

function ReadCookie() {
    const cookieValue = document.cookie
        .split('; ')
        .find(row => row.startsWith('newUserData'))
        .split('=')[1];
    alert(cookieValue);
    console.log(document.cookie);
    console.log(cookieValue);
    return cookieValue;
}

