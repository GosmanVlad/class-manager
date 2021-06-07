<!DOCTYPE html>
<html lang="en">
<?php include $_SERVER['DOCUMENT_ROOT'] . "/class/components/header.php"; 
include $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/StudentController.php";?>
<script src="<?=URL?>assets/js/presence-code.js"></script>
<script src="<?=URL?>assets/js/course-list.js"></script>
<script src="<?=URL?>assets/js/download-csv.js"></script>

<body>
    <div class="background-color">
        <?php showNavMenu(); ?>
        <main>
            <h2 style="text-align: left;">The Catalog</h2>
            <?php if (isTeacher()) { ?>
                <h3>Please choose the year:
                    <select id="year"  onchange="showStudents(this.value, 'A', <?=getAuthID()?>, <?=$_GET['course']?>)">
                        <option selected="true" disabled>Select</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </h3>
                <h3>Please choose the group:
                    <select id="group" onchange="selectGroup(this.value, <?=getAuthID()?>, <?=$_GET['course']?>)">
                        <option selected="true" disabled>Select</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                        <option>E</option>
                    </select>
                </h3>
                <table class="table-style" style="text-align: left;">
                    <tr>
                        <th>Name of Student</th>
                        <th>Grades</th>
                        <th>Presence</th>
                        <th>Actions</th>
                    </tr>
                    <tr id="student-table">
                    </tr>
                </table>
                <h3 style="text-align: right;">Export this catalog in:
                    <select>
                        <option>CSV</option>
                        <option>HTML</option>
                        <option>PDF</option>
                    </select>
                </h3>
                <button type="submit" class="button-style btn-small btn-red" style="float:right" id="export" onclick='exportCSV(document.querySelector("table").outerHTML, "students.csv")'>Export</button>
                <div class="input-box">
                    <h2 class="input-box-h2">Generator</h2>
                    <h3>This code will be active for:
                        <select id="expiration">
                            <option>1</option>
                            <option>3</option>
                            <option>5</option>
                            <option>7</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        minutes.
                    </h3>
                    <!-- Hidden area -> send it to JS and then to DB -->
                    <input class="get-code" type="text" id="teacher-id" value=<?=getAuthID()?> hidden>
                    <input class="get-code" type="text" id="course-id" value=<?=$_GET['course']?> hidden>

                    <input class="get-code" type="text" placeholder="Random Code" id="code" readonly="">
                    
                    <svg class="copy" onclick="copyCode(); f1();" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.508 11.504l.93-2.494 2.998 6.268-6.31 2.779.894-2.478s-8.271-4.205-7.924-11.58c2.716 5.939 9.412 7.505 9.412 7.505zm7.492-9.504v-2h-21v21h2v-19h19zm-14.633 2c.441.757.958 1.422 1.521 2h14.112v16h-16v-8.548c-.713-.752-1.4-1.615-2-2.576v13.124h20v-20h-17.633z" />
                    </svg>
                    <div class="generate-btn" onclick="getCode();">Generate your presence code</div>
                </div>
                <h3 id="countdown"></h3>
                
            <?php } else if (isStudent()) {
                $courses = (new Student()) -> getAssignedCourses(getAuthID()); ?>
                <table class="table-style" style="text-align: left;">
                    <tr>
                        <th>Course Name</th>
                        <th>Your Grades</th>
                        <th>Number of presences</th>
                    </tr>
                    <?php
                    foreach($courses as $row){ ?>
                        <tr>
                            <td><?=$row['course']?></td>
                            <td><?=$row['grades']?></td>
                            <td><?=$row['presences']?></td>
                       </tr>
                    <?php } ?>
                    
                </table>
                <div class="input-box">
                    <?php if(isset($_GET['error'])) { 
                        if($_GET['error'] == 2)
                            echo 'Cod expirat!'; ?>
                    <?php } ?>
                    <h2 class="input-box-h2">Please input your presence code:</h2>
                    <!-- Hidden area --> 
                    <input type="text" name="code" placeholder="" id="student-id" value="<?=getAuthID()?>" hidden>
                    <input type="text" name="code" placeholder="" id="course-id" value="2" hidden>

                    <input type="text" name="code" placeholder="" id="code">
                    <div class="generate-btn" onclick="insertCode();">Submit</div>
                </div>
            <?php } ?>
        </main>
    </div>
</body>
<script>
function selectGroup(value, teacher, course) {
    showStudents(this.document.getElementById('year').value, this.document.getElementById('group').value, teacher, course);
}
</script>
</html>