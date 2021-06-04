<!DOCTYPE html>
<html lang="en">
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/components/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/RegistrationController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/StudentController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/CourseController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AllocationController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/GradeController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/ApplicationController.php";

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
                    <?php
                    if (count($getAllRegistrations)) {
                        foreach ($getAllRegistrations as $row) { ?>
                            <tr>
                                <td><?= $row['student'] ?></td>
                                <td><?= $row['group_letter'] ?></td>
                                <td><?= $row['course'] ?></td>
                                <td><a href="<?= URL ?>app/api/teacher/accept_student.php?id=<?= $row['id'] ?>&studentid=<?= $row['student_id'] ?>&courseid=<?= $row['course_id'] ?>&teacherid=<?=getAuthID()?>" class="button-style btn-green btn-small">Approve</a> /
                                    <a href="<?= URL ?>app/api/teacher/reject_student.php?id=<?= $row['id'] ?>" class="button-style btn-red btn-small">Reject</a>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td>Nu s-au gasit inregistrari</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else if (isStudent()) { ?>
                <h2>What you study:</h2>
                <?php
                $getAssignedCourses = (new Student())->getAssignedCourses(getAuthID());
                $getAllCoursesNotAssigned = (new Student())->getAllCoursesNotAssigned(getAuthID());
                ?>
                <table class="table-style">
                    <tr>
                        <th>Course</th>
                        <th>Credits</th>
                        <th>Your grade</th>
                        <th>Status</th>
                    </tr>
                    <?php foreach ($getAssignedCourses as $row) { ?>
                        <tr>
                            <td><?= $row['course'] ?></td>
                            <td><?= $row['credits'] ?></td>
                            <td><?= $row['grades'] ?></td>
                            <td><strong class="color-green">Acceptat</strong> (Profesor: <?= $row['teacher'] ?>)</td>
                        </tr>
                    <?php } ?>

                    <?php foreach ($getAllCoursesNotAssigned as $row) {
                        $listOfTeachers = (new Teacher())->getListOfTeachers($row['course_id']);
                        $applicationInPending = (new Application())->isInPending(getAuthID(), $row['course_id']);
                    ?>
                        <tr>
                            <td><?= $row['course'] ?></td>
                            <td><?= $row['credits'] ?></td>
                            <td>-</td>
                            <td>
                                <?php if ($applicationInPending['in_pending'] == true) { ?>
                                    <strong class="color-orange">In pending</strong> (Profesor: <?= $applicationInPending['teacher'] ?>)
                                <?php } else { ?>
                                    <form method="POST" action="<?= URL ?>app/api/students/send_application.php">
                                        <input type="text" name="course-id" value="<?= $row['course_id'] ?>" hidden>
                                        <strong class="color-red">You don't have a group yet! Choose a teacher!</strong><br />
                                        <select name="option">
                                            <?php if (count($listOfTeachers))
                                                foreach ($listOfTeachers as $teacherRow) { ?>
                                                <option value="<?= $teacherRow['id'] ?>"><?= $teacherRow['first_name'] ?> <?= $teacherRow['last_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <button type="submit" class="button-style btn-green btn-small">Send</button>
                                    </form>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
        </main>
    </div>
</body>

</html>

<!-- Particular style only for this page  -->
<style>

</style>