<!DOCTYPE html>
<html lang="en">
<?php
include('./components/header.php');
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/RegistrationController.php"; 
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/StudentController.php"; 
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/CourseController.php"; 
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AllocationController.php"; 
if (!isLogged())
    header("Location: login.php");
?>

<body>
    <div class="content">
        <?php showNavMenu(); ?>
        <div class="topright">Hello, <?php echo $_SESSION['last_name'] . ' ' . $_SESSION['first_name']; ?>!</div>
        <main>
            <h1>Welcome to Class Manager</h1>
            <p> Welcome to your Class portal!Here you will find everything you need!</p>
            <?php showCards('home'); ?>
            <hr />

            <!-- TABLE -->
            <?php if (isTeacher()) { ?>
                <h2>Registration applications</h2>
                
                <?php 
                $registration = new Registration(); 
                $getAllRegistrations = $registration->getAllRegistrations(getAuthID());
                ?>
                <table class="table-style">
                    <tr>
                        <th>Student</th>
                        <th>Year and Group</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($getAllRegistrations as $row) {?>
                        <tr>
                            <td><?=(new Student())->getStudentByID($row['student_id'])['first_name']?></td>
                            <td><?=$row['group_letter']?></td>
                            <td><?=(new Course())->getCourseByID($row['course_id'])['name']?></td>
                            <td><a href="app/api/teacher/accept_student.php?id=<?=$row['id']?>&studentid=<?=$row['student_id']?>&courseid=<?=$row['course_id']?>" class="button-style btn-green btn-small">Approve</a> / <a href="#" class="button-style btn-red btn-small">Reject</a></td>
                        </tr>
                    <?php }?>
                </table>
            <?php } else if (isStudent()) { ?>
                <h2>What you study:</h2>
                <table class="table-style">
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