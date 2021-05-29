<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/StudentController.php"; 
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/includes/functions.php"; 

if(isset($_POST['option'])) {

    if($_POST['option'] == 0)
        header("Location: http://localhost/class");
    else {
        (new Student())->sendApplication(getAuthID(), $_POST['option'], $_POST['course-id'], (new Student())->getGroup(getAuthID()));
    }
    header("Location: http://localhost/class");

}