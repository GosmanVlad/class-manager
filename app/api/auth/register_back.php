<html lang="ro">
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AccountController.php"; 
include $_SERVER['DOCUMENT_ROOT'] . "/class/components/header.php";?>
<body class="background-photo">
<div class="form-container">
<?php
    if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'] || empty($_POST['last_name']) || empty($_POST['first_name']) || empty($_POST['account_type'])))
        header("Location: https://localhost/class/index.php");
    else
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $repeat_password = md5($_POST['repeat-password']);
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $account_type = $_POST['account-type'];

        if(isset($_POST['year'])) {
            $year = $_POST['year'];
            $group_letter = $_POST['group_letter'];
        }

        if($password == $repeat_password) {
            $new_account = new Account();

            if(isset($_POST['year']))
                $execute = $new_account->registerAccount($username, $first_name, $last_name, $email, $password, $account_type, $year, $group_letter);
            else
                $execute = $new_account->registerAccount($username, $first_name, $last_name, $email, $password, $account_type);

            if($execute!=0)
                header( "Location: https://localhost/class/index.php" );
        } else {
            echo 'The passwords don not match!';
        }
    }
?>
</div>
</body>