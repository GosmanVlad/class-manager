<?php
echo '<div class="row content-center">';
if(isTeacher()) {
    echo'
    <div class="column">
        <div class="card card-blue">
        <h3>Informatii card 1 profesori</h3>
        <p>Total studenti: 100</p>
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
    </div>';
}
else if(isStudent()) {
    echo'<div class="column">
        <div class="card card-blue">
        <h3>Informatii student: '.$_SESSION['last_name'].' '.$_SESSION['first_name'].'</h3>
        An: 2 <br/>
        Grupa: 5 <br />
        Bursa: 0
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
    </div>';
}
echo '</div>';
?>