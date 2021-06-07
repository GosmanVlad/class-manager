<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AdminController.php"; 

if(isset($_GET['id'])) {

    (new Admin())->updateApprovedTeacher($_GET['id'], 1);
    header("Location: http://localhost/class/public/admin.php");
}