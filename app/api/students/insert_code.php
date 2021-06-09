<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/StudentController.php"; 
header("Access-Control-Allow-Origin: *");

if(isset($_GET['code']) && isset($_GET['student'])) {
    $result = (new Student())->insertCode($_GET['code'], $_GET['student']);  
    echo $result;
    exit;
}