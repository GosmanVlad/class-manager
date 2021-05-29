<!DOCTYPE html>
<html lang="ro">
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/components/header.php";
if(isLogged())
    header("Location: index.php"); ?>

<body class="background-photo cursor">

    <form class="form-container">

        <h2>Recover your password</h2>
        <img src="<?php echo '' . URL . '' ?>assets/images/recover.svg" width="50" height="50" alt="Recover Logo">
        <div class="margin-20">
            <label for="uname"><b>E-mail</b></label>
            <input class="input-login-register button" type="text" placeholder="Enter E-mail" id="uname" required>
        </div>

        <button class="button-style btn-pencil btn-cyan btn-full btn-medium cursor" type="submit">Recover</button>

    </form>

</body>

</html>

<!-- Particular style only for this page  -->
<style>
</style>