<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/GradeController.php"; 

if(isset($_POST['max-grades'])) {
    (new Grade())->updateMaxGrade($_POST['course-id'], $_POST['max-grades']);

    $course = $_POST['course-id'];
    header("Location: http://localhost/class/public/calculator.php?course=$course");
    
}
else if(isset($_GET['change'])) {
    (new Grade())->updateMaxGrade($_GET['change'], 0);

    $course = $_GET['change'];
    header("Location: http://localhost/class/public/calculator.php?course=$course");
}