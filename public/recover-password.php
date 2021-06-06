<!DOCTYPE html>
<html lang="ro">
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/components/header.php";
if (isLogged())
    header("Location: index.php"); ?>

<body class="background-photo cursor">

    <form class="form-container" action="<?= URL ?>app/api/auth/reset_password.php" method="POST">

        <h2>Recover your password</h2>
        <img src="<?php echo '' . URL . '' ?>assets/images/recover.svg" width="50" height="50" alt="Recover Logo">
        <div class="margin-20">
            <label class="label-recover" for="uname"><b>E-mail</b></label>
            <input class="input-login-register button" type="text" placeholder="Enter E-mail" name="email" required>
            <label class="label-recover" for="uname"><b>Old Password</b></label>
            <input class="input-login-register button" type="password" placeholder="Enter your old Password" name="oldpass" required>
            <label class="label-recover" for="uname"><b>New Password</b></label>
            <input class="input-login-register button" type="password" placeholder="Enter your new Password" name="newpass" required>
            <label class="label-recover" for="uname"><b>Confirm New Password</b></label>
            <input class="input-login-register button" type="password" placeholder="Re-Enter your new Password" name="repeatnewpass" required>
        </div>

        <button class="button-style btn-pencil btn-cyan btn-full btn-medium cursor" type="submit">Recover</button>
        <p id="register"><a href="login.php" class="cursor">Go back to log-in</a></p>

    </form>

</body>

</html>

<!-- Particular style only for this page  -->
<style>
</style>