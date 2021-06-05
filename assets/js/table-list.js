function showStudents(year, group = 'A', teacher, course) {
    if (group == "") {
      document.getElementById("student-table").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("student-table").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","http://localhost/class/app/api/teacher/calculator_table.php?year="+year+"&group="+group+"&course="+course+"&teacher="+teacher,true);
      xmlhttp.send();
    }
}