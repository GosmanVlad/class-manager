<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/TeacherController.php";

if (isset($_GET['year']) && isset($_GET['group']) && isset($_GET['course']) && isset($_GET['teacher'])) {
    $result = (new Teacher())->getStudentsByYearAndGroup($_GET['teacher'], $_GET['year'], $_GET['group'], $_GET['course']); ?>

    <tr>
        <th>Name of Student</th>
        <th>Grades</th>
        <th>Presence</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($result as $row) { ?>
        <tr>
            <td><?= $row['student'] ?></td>
            <td><?= $row['grades'] ?></td>
            <td>
                <?php for ($index = 0; $index < $row['presences']; $index++) { ?>
                    <svg class="thick-logo" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M5.48 10.089l1.583-1.464c1.854.896 3.028 1.578 5.11 3.063 3.916-4.442 6.503-6.696 11.312-9.688l.515 1.186c-3.965 3.46-6.87 7.314-11.051 14.814-2.579-3.038-4.301-4.974-7.469-7.911zm12.52 3.317v6.594h-16v-16h15.141c.846-.683 1.734-1.341 2.691-2h-19.832v20h20v-11.509c-.656.888-1.318 1.854-2 2.915z" />
                    </svg>
                <?php } ?>
                <?= $row['presences'] ?>
            </td>
            <td><a href="http://localhost/class/app/api/teacher/revoke_student.php?student=<?= $row['student_id'] ?>&course=<?= $_GET['course'] ?>" class="button-style btn-small btn-red" disabled>Revoke</button></td>
        <tr>
    <?php }
}
