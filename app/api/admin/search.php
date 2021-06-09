<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AdminController.php";

if (isset($_GET['name'])) {
    $resultStudents = (new Admin())->searchStudents($_GET['name']); 
    $resultCourses = (new Admin())->searchCourses($_GET['name']); 
    $resultTeachers = (new Admin())->searchTeachers($_GET['name']); 
    ?>

    <h3>Students:</h3>
    <?php if($resultStudents == 0) { ?>
        <strong class="color-red">Nu s-au gasit rezultate!</strong>
    <?php } else { ?>
        <table class="table-style" style="text-align: left;">
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Year</th>
                <th>Group</th>
                <th>Scholarship</th>
            </tr>
            <?php foreach ($resultStudents as $row) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['first_name'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['year'] ?></td>
                    <td><?= $row['group'] ?></td>
                    <td><?= $row['scholarship'] ?></td>
                <tr>
            <?php } ?>
        </table> 
    <?php } ?>
    <hr />
    <h3>Teachers:</h3>
    <?php if($resultTeachers == 0) { ?>
            <strong class="color-red">Nu s-au gasit rezultate!</strong>
    <?php } else { ?>
        <table class="table-style" style="text-align: left;">
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Registration date</th>
            </tr>
            <?php foreach ($resultTeachers as $row) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['first_name'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['register_date'] ?></td>
                <tr>
            <?php } ?>
        </table>
    <?php } ?>
    <hr />
    <h3>Courses:</h3>
    <?php if($resultCourses == 0) { ?>
            <strong class="color-red">Nu s-au gasit rezultate!</strong>
    <?php } else { ?>
        <table class="table-style" style="text-align: left;">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Year</th>
                <th>Credits</th>
            </tr>
            <?php foreach ($resultCourses as $row) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['year'] ?></td>
                    <td><?= $row['credits'] ?></td>
                <tr>
            <?php } ?>
        </table>
    <?php } ?>
<?php } ?>
