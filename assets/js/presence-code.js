function f1(){
    alert ('Succes!The code is copied to your clipboard.');
}
function getCode() {
    var chars = "0123456789abcdefghijklmnopqrstuvwxtzABCDEFGHIJKLMNOPQRSTUVWXTZ";
    var codeLength = 6;
    var code = "";
    for (var i = 0; i < codeLength; i++) {
        var randomChar = Math.floor(Math.random() * chars.length);
        code += chars.substring(randomChar, randomChar + 1);
    }
    document.getElementById("code").value = code;

    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", "http://localhost/class/app/api/teacher/save_presence_code.php?code="+code+"&expiration="+document.getElementById("expiration").value+"&teacher="+document.getElementById("teacher-id").value+"&course="+document.getElementById("course-id").value, true);
    xmlHttp.addEventListener("load", ajaxCallback, false);
    xmlHttp.send();
    alert("Reload the page!");
}

function ajaxCallback(event){
}


function copyCode() {
    var copyCodeText = document.getElementById("code");
    copyCodeText.select();
    copyCodeText.setSelectionRange(0, 9999);
    document.execCommand("copy");
}

function insertCode() {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", "http://localhost/class/app/api/students/insert_code.php?code="+document.getElementById("code").value+"&student="+document.getElementById("student-id").value+"&course="+document.getElementById("course-id").value, true);
    xmlHttp.addEventListener("load", ajaxCallback, false);
    xmlHttp.send();
}