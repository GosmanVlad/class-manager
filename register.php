<!DOCTYPE html>
<html lang="ro">
<?php
include('./components/header.php');
if (isset($_SESSION['auth']))
    header("Location: index.php"); ?>

<body class="background-photo">
    <form method="POST" action="app/api/auth/register_back.php" class="form-container">
        <h2>Register Form</h2>
        <img src="<?php echo '' . URL . '' ?>assets/images/register.svg" width="50" height="50" alt="Register Logo">

        <div class="margin-20">
            <label for="uname"><b>Username</b></label>
            <input class="input-field" name="username" type="text" class="button" placeholder="Enter Username" required>
        </div>

        <div class="margin-20">
            <label for="uname"><b>First Name</b></label>
            <input class="input-field" name="first_name" type="text" class="button" placeholder="Enter First Name" required>
        </div>

        <div class="margin-20">
            <label for="uname"><b>Last Name</b></label>
            <input class="input-field" name="last_name" type="text" class="button" placeholder="Enter Last Name" required>
        </div>

        <div class="margin-20">
            <label for="email"><b>E-mail</b></label>
            <input class="input-field" name="email" type="text" class="button" placeholder="Enter E-mail" required>
        </div>

        <div class="margin-20">
            <label for="psw"><b>Password</b></label>
            <input class="input-field" name="password" type="password" class="button" placeholder="Enter Password" required>
        </div>

        <label for="years">Choose the year you are in :</label>

        <select name="years" id="years">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>

        <p>I'm a : </p>
        <input type="radio" name="account-type" value="student">
        <label for="student">Student</label>

        <input type="radio" name="account-type" value="teacher">
        <label for="teacher">Teacher</label>

        <button class="button-submit" type="submit">Register</button>
    </form>

</body>

</html>

<!-- Particular style only for this page  -->
<style>
    html {
        cursor: url('assets/images/pencil.svg') 0 24, pointer;
    }
</style>