<div class="row content-center">
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/TeacherController.php"; 
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AssesmentsController.php"; 
if(isTeacher()) { ?>
    <div class="column">
        <div class="card card-blue">
        <h3>General informations</h3>
        <p><strong>All students:</strong> <?=(new Teacher())->getCountStudentsByTeacherID(getAuthID())?> <br>
        <strong>Total courses taught:</strong> <?=(new Teacher())->getCountCoursesByTeacherID(getAuthID())?><br>
        <strong>Registration date:</strong> <?=(new Teacher())->getRegistrationDate(getAuthID())['registration_date'];?></p>
        </div>
    </div>

    <div class="column">
        <div class="card card-light">
        <h3>Informations about assesments</h3>
        <p><strong>Corrected homeworks:</strong> <?=(new Teacher())->getCorrectedHomeworks(getAuthID())?><br>
        <strong>Uncorrected homeworks:</strong> <strong class="color-red"><?=(new Teacher())->getUncorrectedHomeworks(getAuthID())?></strong> <br>
        <strong>Average corrected homeworks:</strong> <?=(new Assesments())->getAverageGrades(getAuthID())?></p>
        </div>
    </div>

    <div class="column">
        <div class="card card-purple">
        <h3>Other informations</h3>
        <p><strong>Unsolved applications:</strong> <?=(new Registration())->getCountRegistrations(getAuthID())?><br>
        <strong>What you teach:</strong> <?=(new Teacher())->getShortNameOfCourses(getAuthID())?><br>
        <strong>Average corrected homeworks:</strong> <?=(new Assesments())->getAverageGrades(getAuthID())?></p>
        </div>
    </div>
<?php }
else if(isStudent()) { ?>
    <div class="column">
        <div class="card card-blue">
        <h3><strong>Student informations:</strong> <?=$_SESSION['last_name']?> <?=$_SESSION['first_name']?></h3>
        <strong>Year:</strong> <?=(new Student())->getYear(getAuthID())?> <br/>
        <strong>Scholarship:</strong> <?=(new Student())->getScholarship(getAuthID())?>  <br/>
        <strong>Group:</strong> <?=(new Student())->getGroup(getAuthID())?>
        </div>
    </div>

    <div class="column">
        <div class="card card-light">
        <h3>Course informations</h3>
        <strong>Assigned courses:</strong> <?=(new Student())->getCountAssignedCourses(getAuthID())?><br/>
        <strong>Unassigned courses</strong> <?=(new Student())->getCountCoursesNotAssigned(getAuthID())?><br/>
        <strong>Average grades:</strong> <?=(new Student())->gradesAverage(getAuthID())?>
        </div>
    </div>

    <div class="column">
        <div class="card card-purple">
        <h3>Informations about assesments</h3>
        <strong>Homeworks sent:</strong> <?=(new Assesments())->getCountAssesments(getAuthID())?><br/>
        <strong>Uncorrected homeworks:</strong> <?=(new Assesments())->getCountUncorrectedAssesments(getAuthID())?><br/>
        <strong>Average grades:</strong> <?=(new Assesments())->getAverageAssesments(getAuthID())?>
        </div>
    </div>
<?php }?>
</div>