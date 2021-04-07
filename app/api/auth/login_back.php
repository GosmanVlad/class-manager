<html lang="ro">
<?php
$server_root = $_SERVER['DOCUMENT_ROOT'];
include $server_root . "/class/app/Controllers/AccountController.php";
include $_SERVER['DOCUMENT_ROOT'] . "/class/components/header.php"; ?>

<body class="background-photo">
<div class="form-container">
    <?php
    if(empty($_POST['email'] || empty($_POST['password']) ))
        header("Location: index.php");
    else {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $account = new Account();

        if($account->tryToLogin($email, $password) == 1) {
            header( "Location: ../../../index.php" );
        }
        else {
            echo 'Error. <br /> Please try again! <hr/>';
            echo "<a href='".URL."login.php'>Back to login</a>";
        }
    }
    ?>
</div>
</html>