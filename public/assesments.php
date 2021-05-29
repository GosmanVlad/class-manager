<!DOCTYPE html>
<html lang="en">
<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/class/components/header.php";
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/StudentController.php";
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AssesmentsController.php";
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
                    </tr>
                    <?php foreach($getAllAssesments as $row) { ?>
                        <tr>
                            <td><a href="<?=URL . $row['file']?>"><?=$row['file_name']?></a></td>
                            <td><?=$row['course']?></td>
                            <td><?=$row['grade']?></td>
                            <td><?=$row['corrector']?></td>
                            <td><?=$row['observations']?></td>
                        </tr>
                    <?php } ?>
                </table>
                <?php $getAssignedCourses = (new Student())->getAssignedCourses(getAuthID()); ?>
                <p>Click on the "Choose File" button to upload a new file:</p>
                <form action="<?=URL?>app/api/students/send_homework.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="student-id" value="<?=getAuthID()?>" hidden>
                    <select name="course">
                    <?php foreach ($getAssignedCourses as $row) { ?>
                            <option value="<?= $row['course_id'] ?>"><?=$row['course']?></option>
                        <?php } ?>
                    </select>
                    <input type="file" name="file" size="50" />
                    <input type="submit" class="button-style btn-small btn-cyan">
                </form>
            <?php } else if (isTeacher()) { ?>
                <h2 style="text-align: left;">Files you haven't graded yet</h2>
                <table class="table-style" style="text-align: left;">
                    <tr>
                        <th>Name of the student</th>
                        <th>Name of the file</th>
                        <th>Grade given</th>
                        <th>Additional message from you</th>
                        <th>Download</th>
                        <th>Submit</th>
                    </tr>
                    <tr>
                        <td>Luca Andrei Iulian</td>
                        <td>math.pdf</td>
                        <td><select>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </td>
                        <td><input type="text" class="message"></td>
                        <td>
                            <button type="button" class="button-style btn-small btn-red">Download</button>
                        </td>
                        <td>
                            <input type="submit" class="button-style btn-small btn-cyan">
                        </td>
                    </tr>
                    <tr>
                        <td>Gosman Vlad Andrei</td>
                        <td>script.sql</td>
                        <td><select>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>
                        </td>
                        <td><input type="text" class="message"></td>
                        <td>
                            <button type="button" class="button-style btn-small btn-red">Download</button>
                        </td>
                        <td>
                            <input type="submit" class="button-style btn-small btn-cyan">
                        </td>
                    </tr>
                </table>

            <?php } ?>
        </main>
    </div>
</body>

</html>