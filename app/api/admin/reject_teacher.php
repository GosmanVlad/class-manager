<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AdminController.php"; 

if(isset($_GET['id'])) {

    (new Admin())->deleteTeacherApplication($_GET['id']);
    header("Location: http://localhost/class/public/admin.php");
}