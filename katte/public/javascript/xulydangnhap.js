checkCookie();
function tatFormDK() {
    document.getElementById("regisform").style.display = "none";
}


function dangKy() {
    document.getElementById("regisform").style.display = "block";
    tatFormDN();

}

function tatFormDN() {
    document.getElementById("loginform").style.display = "none";
}

function dangNhap() {
    document.getElementById("loginform").style.display = "block";
    tatFormDK();
}

function setCookie(cname, cvalue) {
    document.cookie = cname + "=" + cvalue + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var user = getCookie("username");
    if (user != "") {
        dangnhap.innerHTML="Xin chào "+user;
        dangky.innerHTML="";
    }
    else{
        dangxuat.innerHTML="";
    }
}
function xoaCookie(){
    setCookie("username","");
    checkCookie();
    
}