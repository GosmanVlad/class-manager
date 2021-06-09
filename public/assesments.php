<!DOCTYPE html>
<html lang="en">
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/components/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/StudentController.php";
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AssesmentsController.php";

if (!isset($_GET['course']) && isTeacher()) {
    header("Location: index.php");
}
?>

<body>
    <div class="background-color">
        <?php showNavMenu(); ?>
        <main>
            <?php if (isStudent()) {
                $getAllAssesments = (new Assesments())->getAllAssesments(getAuthID());
            ?>
                <h2 style="text-align: left;">Files you have uploaded so far:</h2>
                <table class="table-style" style="text-align: left;">
                    <tr>
                        <th>File</th>
                        <th>Course</th>
                        <th>Grade Received</th>
                        <th id="fit">The teacher that corrected your assignment</th>
                        <th>Additional message from your teacher</th>
                        <th>Sent at</th>
                        <th>Corrected at</th>
                    </tr>
                    <?php foreach ($getAllAssesments as $row) { ?>
                        <tr>
                            <td><a href="<?= URL . $row['file'] ?>"><?= $row['file_name'] ?></a></td>
                            <td><?= $row['course'] ?></td>
                            <td><?= $row['grade'] ?></td>
                            <td><?= $row['corrector'] ?></td>
                            <td><?= $row['observations'] ?></td>
                            <td><?= $row['sent_at'] ?></td>
                            <td><?= $row['corrected_at'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <?php $getAssignedCourses = (new Student())->getAssignedCourses(getAuthID()); ?>
                <p>Click on the "Choose File" button to upload a new file:</p>
                <form action="<?= URL ?>app/api/students/send_homework.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="student-id" value="<?= getAuthID() ?>" hidden>
                    <select name="course">
                        <?php foreach ($getAssignedCourses as $row) { ?>
                            <option value="<?= $row['course_id'] ?>"><?= $row['course'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="file" name="file" size="50" />
                    <input type="submit" class="button-style btn-small btn-cyan">
                </form>
            <?php } else if (isTeacher()) {
                $getAssesments = (new Assesments())->getAssesmentsByTeacherID(getAuthID(), $_GET['course']);
            ?>
                <h2 style="text-align: left;">Files you haven't graded yet</h2>
                <form method="POST" action="<?= URL ?>app/api/teacher/correct_assesment.php">
                    <table class="table-style" style="text-align: left;">
                        <tr>
                            <th>Name of the student</th>
                            <th>Name of the file</th>
                            <th>Grade given</th>
                            <th>Additional message from you</th>
                            <th>Submit</th>
                            <th>Download</th>
                            <th>Sent at</th>
                        </tr>

                        <?php foreach ($getAssesments as $row) { ?>

                            <tr>
                                <td><?= $row['student'] ?></td>
                                <td><?= $row['file_name'] ?></td>

                                <td>
                                    <?php if ($row['corrected']) { ?>
                                        <strong><?= $row['grade'] ?></strong>
                                    <?php } else { ?>
                                        <select name="grade">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($row['corrected']) { ?>
                                        <strong><?= $row['observations'] ?></strong>
                                    <?php } else { ?>
                                        <input type="text" name="observations" class="message">
                                        <input type="text" name="assesment-id" value="<?= $row['id'] ?>" hidden>
                                        <input type="text" name="course-id" value="<?= $row['course_id'] ?>" hidden>
                                    <?php } ?>
                                <td>
                                    <?php if ($row['corrected']) { ?>
                                        <strong> Tema corectata</strong>
                                    <?php } else { ?>
                                        <button type="submit" class="button-style btn-small btn-cyan">Send</button>
                                    <?php } ?>
                                </td>

                                <td>
                                    <a href="<?= URL . $row['file'] ?>" class="button-style btn-small btn-red">Download</a>
                                </td>
                                <td>
                                    <?= $row['sent_at'] ?>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>
                </form>

            <?php } ?>
        </main>
    </div>
</body>

</html>