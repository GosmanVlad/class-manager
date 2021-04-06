<!DOCTYPE html>
<html lang="ro">
<?php
include('./components/header.php');
if (isset($_SESSION['auth']))
    header("Location: index.php");
?>

<body class="background-photo">
    <form method="POST" action="app/api/auth/login_back.php" class="form-container">

        <h2>Welcome to ClaMa</h2>
        <img src="<?php echo '' . URL . '' ?>assets/images/stud.svg" width="50" height="50" alt="Graduation Logo">
        <div class="margin-20">
            <label for="uname"><b>Email</b></label>
            <input class="input-field" name="email" type="text" class="button" placeholder="Enter Username" required>
        </div>

        <div class="margin-20">
            <label for="psw"><b>Password</b></label>
            <input class="input-field" name="password" type="password" class="button" placeholder="Enter Password" required>
        </div>

        <button class="button-submit" type="submit">Login</button>

        <p id="login">Ups, you forgot your password? <a href="recover-password.php">Recover it</a></p>
        <p id="register">You don't have an account? <a href="register.php">Register now</a></p>

    </form>

</body>

</html>

<!-- Particular style only for this page  -->
<style>
    html {
        cursor: url('assets/images/pencil.svg') 0 24, pointer;
    }
</style>