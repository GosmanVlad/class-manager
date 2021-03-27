<!DOCTYPE html>
<html lang="ro">
<?php include('./components/header.php');
require_once('./api/student.php'); ?>

<body>
    <div class="background-photo">

        <form class="container">

            <h2>Recover your password</h2>
            <img src="recover.svg" width="50" height="50" alt="Recover Logo">
            <div class="user">
                <label for="uname"><b>E-mail</b></label>
                <input type="text" class="button" placeholder="Enter E-mail" id="uname" required>
            </div>

            <button type="submit">Recover</button>

        </form>

    </div>
</body>

<!-- Particular style only for this page  -->
<style>
</style>