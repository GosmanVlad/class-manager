<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/TeacherController.php"; 

if(isset($_GET['year']) && isset($_GET['group']) && isset($_GET['course']) && isset($_GET['teacher'])) {
    $result = (new Teacher())->getStudentsByYearAndGroup($_GET['teacher'], $_GET['year'], $_GET['group'], $_GET['course']);
    $array = [];
    foreach($result as $row) {?>
        <td><?=$row['student']?></td>
        <td><?=$row['grades']?></td>
        <td>
            <form action="http://localhost/class/app/api/teacher/send_grade.php" method="POST">
                <input type="text" name="grade" class="message"> 

                <!-- HIDDEN AREA -->
                <input type="text" name="student" class="message" value="<?=$row['student_id']?>" hidden> 
                <input type="text" name="teacher" class="message" value="<?=$_GET['teacher']?>" hidden> 
                <input type="text" name="course" class="message" value="<?=$_GET['course']?>" hidden> 
                <!----------------->
                
                <button type="submit" class="button-style btn-small btn-red">Send</button>
            </form>
        </td>
        <td>
            <strong>Media aritmetica:</strong> <?=$row['average']?> <br />
            <strong>Media aritmetica rotunjita:</strong> <?=$row['average_round']?> <br />
            <strong>Media aritmetica rotunjita prin lipsa:</strong> <?=$row['average_floor']?> <br />
            <strong>Media aritmetica rotunjita prin adaos:</strong> <?=$row['average_ceil']?> <br />
        </td>
    <?php } 
} ?>

