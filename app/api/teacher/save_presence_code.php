<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/PresenceCodeController.php"; 

if(isset($_GET['code'])) {
    $result = (new PresenceCode())->add($_GET['code'], $_GET['expiration'], $_GET['teacher'], $_GET['course']);
    echo $result;
    exit;
}