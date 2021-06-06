<html lang="ro">
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AccountController.php";
include $_SERVER['DOCUMENT_ROOT'] . "/class/components/header.php"; ?>

<body class="background-photo">
    <div class="form-container">
        <?php
        if (empty($_POST['email']) || empty($_POST['oldpass']) || empty($_POST['newpass']) || empty($_POST['repeatnewpass']))
            header("Location: https://localhost/class/index.php");
        else {

            $email = $_POST['email'];
            $password = md5($_POST['oldpass']);
            $newpass = md5($_POST['newpass']);
            $repeatnewpass = md5($_POST['repeatnewpass']);
            if ($newpass != $repeatnewpass) {
        ?>
                <script>
                    alert("The new password doesn't match with the repeated one!Please re-enter...");
                    window.location.href = "http://localhost/class/public/login.php";
                </script>

        <?php
            } else {
                $account = new Account();

                if ($account->resetPassword($email, $password, $newpass) == 1) {
                    header("Location: https://localhost/class/index.php");
                } else {
                    echo 'Error. <br /> Please try again! <hr/>';
                    echo "<a href='" . URL . "index.php'>Back to login</a>";
                }
            }
        }
        ?>
    </div>

</html>