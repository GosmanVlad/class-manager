<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/TeacherController.php"; 

if(isset($_GET['student']) && isset($_GET['course'])) {
    $result = (new Teacher())->revokeStudent($_GET['student'], $_GET['course']);

    $course = $_GET['course'];
    header("Location: http://localhost/class/public/class.php?course=$course");
}