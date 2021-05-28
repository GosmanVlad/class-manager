<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AllocationController.php"; 
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/ApplicationController.php"; 

if(isset($_GET['id']) && isset($_GET['studentid']) && isset($_GET['courseid'])) {

    (new Allocation())->addStudent($_GET['studentid'], $_GET['courseid']);
    (new Application())->delete($_GET['id']);
    
    header("Location: http://localhost/class");
    
}