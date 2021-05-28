<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/ApplicationController.php"; 

if(isset($_GET['id'])) {
    (new Application())->delete($_GET['id']);
    header("Location: http://localhost/class");
    
}