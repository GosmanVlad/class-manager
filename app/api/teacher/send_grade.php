<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/GradeController.php"; 

if(isset($_POST['grade'])) {
    $setGrade = (new Grade())->sendGrade($_POST['student'], $_POST['course'], $_POST['grade']);

    $course = $_POST['course'];
    if($setGrade == 0) { ?> 
        <script>
            alert("Acest student a atins numarul maxim de note!");
            window.location.href = "http://localhost/class/public/calculator.php?course=<?=$course?>";
        </script> <?php
    }
    else {
        header("Location: http://localhost/class/public/calculator.php?course=$course");
    }
    
}