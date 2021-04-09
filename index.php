<!DOCTYPE html>
<html lang="en">
<?php 
include('./components/header.php');
if(!isLogged())
    header("Location: login.php");
?>

<body>
    <div class="content">
        <?php showNavMenu(); ?>
        <div class="topright">Hello, <?php echo $_SESSION['last_name'] . ' ' . $_SESSION['first_name'];?>!</div>
        <main>
            <h1>
                Welcome to Class Manager
            </h1>
            <p>
                Welcome to your Class portal!Here you will find everything you need!
            </p>
            <?php showCards('home'); ?>
            <hr />

            <?php if(isTeacher()) {?>
                <h2>Registration applications</h2>
                <table id="table-style">
                    <tr>
                        <th>Student</th>
                        <th>Year and Group</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>Gosman Vlad</td>
                        <td>2E3</td>
                        <td>Web technologies</td>
                        <td><a href="#">Approve</a> / <a href="#">Reject</a></td>
                    </tr>
                    <tr>
                        <td>Luca Andrei Iulian</td>
                        <td>2E3</td>
                        <td>Web technologies</td>
                        <td><a href="#" class="button-style btn-green btn-small">Approve</a> / <a href="#" class="button-style btn-red btn-small">Reject</a></td>
                    </tr>
                </table>
            <?php } else if(isStudent()) {?> 
                <h2>What you study:</h2>
                <table id="table-style">
                    <tr>
                        <th>Course</th>
                        <th>Credits</th>
                        <th>Your grade</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>Data structures</td>
                        <td>5</td>
                        <td>10</td>
                        <td>Accepted</td>
                    </tr>
                    <tr>
                        <td>Database</td>
                        <td>6</td>
                        <td>10</td>
                        <td>
                            <strong class="color-red">You don't have a group yet! Choose a teacher!</strong><br />
                            <select>
                                <option>Cosmin Varlan</option>
                                <option>Cosmin Varlan</option>
                            </select>
                            <a href="#" class="button-style btn-green btn-small">Send</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Web technologies</td>
                        <td>6</td>
                        <td>10</td>
                        <td>Accepted</td>
                    </tr>
                </table>
            <?php } ?>
        </main>
    </div>
</body>

</html>

<!-- Particular style only for this page  -->
<style>

</style>