<!DOCTYPE html>
<html lang="ro">
<?php include('./components/header.php');
require_once('./api/student.php'); ?>

<body>
    <div class="background-photo">

        <form class="container">

            <h2>Register Form</h2>
            <img src="register.svg" width="50" height="50" alt="Register Logo">

            <div class="user">
                <label for="uname"><b>Username</b></label>
                <input type="text" class="button" placeholder="Enter Username" id="uname" required>
            </div>

            <div class="first-name">
                <label for="uname"><b>First Name</b></label>
                <input type="text" class="button" placeholder="Enter First Name" id="uname" required>
            </div>

            <div class="last-name">
                <label for="uname"><b>Last Name</b></label>
                <input type="text" class="button" placeholder="Enter Last Name" id="uname" required>
            </div>

            <div class="email">
                <label for="email"><b>E-mail</b></label>
                <input type="text" class="button" placeholder="Enter E-mail" id="email" required>
            </div>

            <div class="pass">
                <label for="psw"><b>Password</b></label>
                <input type="password" class="button" placeholder="Enter Password" id="psw" required>
            </div>

            <p>I'm a : </p>
            <input type="radio" id="student">
            <label for="student">Student</label>

            <input type="radio" id="teacher">
            <label for="teacher">Teacher</label>

            <button type="submit">Register</button>

        </form>

    </div>
</body>

</html>

<!-- Particular style only for this page  -->
<style>
</style>