<?php
$server_root = $_SERVER['DOCUMENT_ROOT'];
include $server_root . "/class/app/Controllers/AccountController.php";

if(empty($_POST['email'] || empty($_POST['password']) ))
    header("Location: index.php");
else {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $account = new Account();

    if($account->tryToLogin($email, $password) == 1) {
        header( "Location: ../../../index.php" );
    }
}
?>