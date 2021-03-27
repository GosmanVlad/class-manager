<!DOCTYPE html>
<html lang="ro">
<?php include('./components/header.php');
require_once('./api/student.php'); ?>

<body class="background-photo">

        <form class="form-container">

            <h2>Welcome to ClaMa</h2>
            <img src="<?php echo '' . URL . '' ?>assets/images/stud.svg" width="50" height="50" alt="Graduation Logo">
            <div class="margin-20">
                <label for="uname"><b>Username</b></label>
                <input class="input-field" type="text" class="button" placeholder="Enter Username" id="uname" required>
            </div>

            <div class="margin-20">
                <label for="psw"><b>Password</b></label>
                <input class="input-field" type="password" class="button" placeholder="Enter Password" id="psw" required>
            </div>

            <p>I'm a : </p>
            <input type="radio" id="student">
            <label for="student">Student</label>

            <input  type="radio" id="teacher">
            <label for="teacher">Teacher</label>

            <button class="button-submit" type="submit">Login</button>

            <p id="login">Ups, you forgot your password? <a href="">Recover it</a></p>

        </form>

</body>

</html>

<!-- Particular style only for this page  -->
<style>
html {
    cursor: url('assets/images/pencil.svg') 0 24, pointer;
}
</style>