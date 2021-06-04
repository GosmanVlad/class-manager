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
    xmlHttp.addEventListener("load", sendAlert, false);
    xmlHttp.send();
}

function sendAlert(){
    alert("Codul de prezenta generat a fost inregistrat in baza de date! Poti distribui codul catre studenti.")
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
    xmlHttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           var response = this.responseText; 
           reload(response);
     
        }
    };
    xmlHttp.send();
}

function reload(errorType)  {
    if(errorType == 2) {
        alert("Acest cod de perzenta a expirat! See you next time! :)");
    }
    else if(errorType == 1) {
        alert("Welcome to the course!");
    }
    else if(errorType == 0) {
        alert("Acest cod nu exista!");
    }
    location.reload();
}