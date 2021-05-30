<div class="row content-center">
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/TeacherController.php"; 
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AssesmentsController.php"; 
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
        <h3>Informatii despre teme</h3>
        <p><strong>Teme corectate:</strong> <?=(new Teacher())->getCorrectedHomeworks(getAuthID())?><br>
        <strong>Teme corectate:</strong> <strong class="color-red"><?=(new Teacher())->getUncorrectedHomeworks(getAuthID())?></strong> <br>
        <strong>Media temelor corectate:</strong> <?=(new Assesments())->getAverageGrades(getAuthID())?></p>
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
        <h3><strong>Informatii student:</strong> <?=$_SESSION['last_name']?> <?=$_SESSION['first_name']?></h3>
        <strong>An:</strong> <?=(new Student())->getYear(getAuthID())?> <br/>
        <strong>Grupa:</strong> <?=(new Student())->getGroup(getAuthID())?> <br />
        <strong>Bursa:</strong> <?=(new Student())->getScholarship(getAuthID())?> 
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