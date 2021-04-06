<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/StudentController.php";

if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'] || empty($_POST['last_name']) || empty($_POST['first_name']) || empty($_POST['account_type'])))
    header("Location: index.php");
else
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    echo $_POST['account-type'];
    $account_type = $_POST['account-type'];


    $new_account = new Student();
    $execute = $new_account->registerAccount($username, $first_name, $last_name, $email, $password, $account_type);

    if($execute!=0)
        header( "Location: ../../../login.php" );
}
?>