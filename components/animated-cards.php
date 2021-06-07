<?php
if(isset($_SESSION['selection-page'])) {
    $page = $_SESSION['selection-page'];

    if($page == 'class')
        $link =  URL . 'public' . '/class.php';
    else if($page == 'assesments') 
        $link =  URL . 'public' . '/assesments.php';
    else if($page == 'calculator') 
        $link =  URL . 'public' . '/calculator.php';
} 

require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/TeacherController.php";
$getCourses = (new Teacher())->getCoursesByTeacherID(getAuthID());
?>

<nav class="content-center">
<ul class="button-list">
    <p class="button-text">Please choose your subject:</p>

    <?php foreach($getCourses as $row) { 
        $getAllStudents = (new Course())->getAllStudents($row['course_id']); 
        $getAllAssignedGrades = (new Course())->getAllAssignedGrades(getAuthID(), $row['course_id']);
        $getTeachClasses = (new Course())->getTeachClasses(getAuthID(), $row['course_id']); ?>
        <a href="<?=$link . '?course=' . $row['course_id']?>" class="button-app">
            <li class="button-item">
                <?=$row['course']?>
                <span class="btn"></span><span class="btn"></span><span class="btn"></span><span
                    class="btn"></span>
            </li>
        </a>
        <ul class="button-info">
            <li>Number of students: <?=$getAllStudents?></li>
            <li>Grades assigned: <?=$getAllAssignedGrades?></li>
            <li>You teach the following classes: <?=$getTeachClasses?></li>
        </ul>
    <?php } ?>
</nav>