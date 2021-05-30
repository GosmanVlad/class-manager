<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AssesmentsController.php"; 

if(isset($_POST['grade']) && isset($_POST['assesment-id'])) {
    if(isset($_POST['observations'])) 
        $observations = $_POST['observations'];
    else
        $observations = "";

    (new Assesments())->update($_POST['assesment-id'], $_POST['grade'], $observations);

    $course = $_POST['course-id'];
    header("Location: http://localhost/class/public/assesments.php?course=$course");
    
}