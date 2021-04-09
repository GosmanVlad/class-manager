<!DOCTYPE html>
<html lang="ro">
<?php
include('./components/header.php');
if(isLogged())
    header("Location: index.php"); ?>

<body class="background-photo cursor">
    <form method="POST" action="app/api/auth/register_back.php" class="form-container">
        <h2>Register Form</h2>
        <img src="<?php echo '' . URL . '' ?>assets/images/register.svg" width="50" height="50" alt="Register Logo">

        <div class="margin-20">
            <label for="uname"><b>Username</b></label>
            <input class="input-login-register" name="username" type="text" class="button" placeholder="Enter Username" required>
        </div>

        <div class="margin-20">
            <label for="uname"><b>First Name</b></label>
            <input class="input-login-register" name="first_name" type="text" class="button" placeholder="Enter First Name" required>
        </div>

        <div class="margin-20">
            <label for="uname"><b>Last Name</b></label>
            <input class="input-login-register" name="last_name" type="text" class="button" placeholder="Enter Last Name" required>
        </div>

        <div class="margin-20">
            <label for="email"><b>E-mail</b></label>
            <input class="input-login-register" name="email" type="text" class="button" placeholder="Enter E-mail" required>
        </div>

        <div class="margin-20">
            <label for="psw"><b>Password</b></label>
            <input class="input-login-register" name="password" type="password" class="button" placeholder="Enter Password" required>
        </div>

        <div class="margin-20">
            <label for="psw"><b>Confirm password</b></label>
            <input class="input-login-register" name="repeat-password" type="password" class="button" placeholder="Enter password again" required>
        </div>

        <p>I'm a : </p>
        <input type="radio" name="account-type" value="student" onclick="showPanel();" />
        <label for="student">Student</label>

        <input type="radio" name="account-type" value="teacher" onclick="hidePanel();" />
        <label for="teacher">Teacher</label>

        <div id="student-panel" class="hide margin-20">
            <hr />
            <label for="years">Choose the year you are in :</label> <br />

            <select name="year">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>

            <select name="group_letter">
                <?php 
                    foreach (range('A', 'Z') as $letter){
                        echo "<option value=$letter>$letter</option>";
                    }
                ?>
            </select>
        </div>

        <button class="button-style btn-pencil btn-green btn-full btn-medium cursor" type="submit">Register</button>
    </form>

</body>

</html>

<!-- Particular style only for this page  -->
<style>
.hide {
  display: none;
}
</style>

<script>
function showPanel() {
    var x = document.getElementById("student-panel");
    x.style.display = "block";
}

function hidePanel() {
    var x = document.getElementById("student-panel");
    x.style.display = "none";
}
</script>