<div class="row content-center">
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/TeacherController.php"; 
if(isTeacher()) { ?>
    <div class="column">
        <div class="card card-blue">
        <h3>Informatii generale</h3>
        <p><strong>Total studenti:</strong> <?=(new Teacher())->getCountStudentsByTeacherID(getAuthID())?> <br>
        <strong>Total materii predate:</strong> <?=(new Teacher())->getCountCoursesByTeacherID(getAuthID())?><br>
        <strong>Data inregistrarii:</strong> <?=(new Teacher())->getRegistrationDate(getAuthID())['registration_date'];?></p>
        </div>
    </div>

    <div class="column">
        <div class="card card-light">
        <h3>Informatii card 2</h3>
        <p>Profesor</p>
        <p>Profesor</p>
        </div>
    </div>

    <div class="column">
        <div class="card card-purple">
        <h3>Informatii card 3</h3>
        <p>Profesor</p>
        </div>
    </div>
<?php }
else if(isStudent()) { ?>
    <div class="column">
        <div class="card card-blue">
        <h3>Informatii student: <?=$_SESSION['last_name']?> <?=$_SESSION['first_name']?></h3>
        An: <?=(new Student())->getYear(getAuthID())?> <br/>
        Grupa: <?=(new Student())->getGroup(getAuthID())?> <br />
        Bursa: <?=(new Student())->getScholarship(getAuthID())?> 
        </div>
    </div>

    <div class="column">
        <div class="card card-light">
        <h3>Informatii card 2</h3>
        <p>Student</p>
        <p>Student</p>
        </div>
    </div>

    <div class="column">
        <div class="card card-purple">
        <h3>Informatii card 3</h3>
        <p>Student</p>
        </div>
    </div>
<?php }?>
</div>