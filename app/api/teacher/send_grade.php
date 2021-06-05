<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/GradeController.php"; 

if(isset($_POST['grade'])) {
    (new Grade())->sendGrade($_POST['student'], $_POST['course'], $_POST['grade']);

    $course = $_POST['course'];
    header("Location: http://localhost/class/public/calculator.php?course=$course");
    
}