function searchByName() {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("GET", "http://localhost/class/app/api/admin/search.php?name="+document.getElementById("search").value, true);
    xmlHttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           var response = this.responseText;
           document.getElementById("search-table").innerHTML = this.responseText;
     
        }
    };
    xmlHttp.send();
}