<!DOCTYPE html>
<html lang="en">
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/components/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AdminController.php";
if(!isAdmin()) 
    header("Location: index.php");
?>
<script src="<?= URL ?>assets/js/presence-code.js"></script>
<script src="<?= URL ?>assets/js/course-list.js"></script>
<script src="<?= URL ?>assets/js/download-csv.js"></script>

<body>
    <div class="background-color">
        <?php showNavMenu(); ?>
        <main>
            <h2 style="text-align: left;">Admin page</h2>
            <?php if (isAdmin()) {
                $teacherInPending = (new Admin())->getTeachersInPending();
            ?>
                <h3>Teachers who have registered on the platform:</h3>
                <table class="table-style" style="text-align: left;">
                    <tr>
                        <th>Name of teacher</th>
                        <th>Email</th>
                        <th>Registration date</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($teacherInPending as $row) { ?>
                        <tr>
                            <td><?= $row['full_name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['registration_date'] ?></td>
                            <td>
                                <a href="<?= URL ?>app/api/admin/accept_teacher.php?id=<?= $row['id'] ?>" class="button-style btn-green btn-small">Approve</a> /
                                <a href="<?= URL ?>app/api/admin/reject_teacher.php?id=<?= $row['id'] ?>" class="button-style btn-red btn-small">Reject</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tr>
                </table> <br />
                <h3>Import XML:</h3>
                <form action="<?= URL ?>app/api/admin/import_xml.php" method="post" enctype="multipart/form-data">
                    Select the table:
                    <select name="table">
                        <option value="teachers">teachers</option>
                        <option value="students">students</option>
                        <option value="courses">courses</option>
                        <option value="holders">holders</option>
                        <option value="allocations">allocations</option>
                    </select> <br>
                    <input type="file" name="xmlFile">
                    <button type="submit" class="button-style btn-small btn-cyan">Import</button>
                </form>
            <?php } ?>
        </main>
    </div>
</body>

</html>