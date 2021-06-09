<!DOCTYPE html>
<html lang="en">
<?php include $_SERVER['DOCUMENT_ROOT'] . "/class/components/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/StudentController.php"; ?>

<body>
    <div class="background-color">
        <?php showNavMenu(); ?>
        <main>
            <h2 style="text-align: left;">Calculator</h2>
            <?php if (isTeacher()) {
                $maxGrades = (new Grade())->getCourseInfo($_GET['course'])['max_grades'];
            ?>
                <h3>Please choose the year:
                    <select id="year" onchange="showStudentsTable(this.value, 'X', <?= getAuthID() ?>, <?= $_GET['course'] ?>)">
                        <option selected="true" disabled>Select</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </h3>
                <h3>Please choose the group:
                    <select id="group" onchange="selectGroupTable(this.value, <?= getAuthID() ?>, <?= $_GET['course'] ?>)">
                        <option selected="true" disabled>Select</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
                        <option>E</option>
                    </select>
                </h3>
                <?php if ($maxGrades == 0) { ?>
                    <h3>Please choose the maximum number of grades:
                        <form action="<?= URL ?>app/api/teacher/set_max_grades.php" method="POST">
                            <input type="text" name="course-id" value=<?= $_GET['course'] ?> hidden>
                            <select name="max-grades">
                                <option selected="true" disabled>Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <button type="submit" class="button-style btn-small btn-green">Save</button>
                        </form>
                    </h3>
                <?php } else { ?>
                    <h3>Please choose the maximum number of grades: <strong class="color-red"><?= $maxGrades ?></strong></a>
                        <a href="<?= URL ?>app/api/teacher/set_max_grades.php?change=<?= $_GET['course'] ?>" class="button-style btn-small btn-green">Change</a>
                    </h3>
                <?php } ?>
                <table class="table-style" style="text-align: left;" id="student-table">
                </table>
            <?php } else if (isStudent()) {
                $assignedCourses = (new Student())->getAssignedCourses(getAuthID());
            ?>
                <table class="table-style" style="text-align: left;">
                    <tr>
                        <th>Course name</th>
                        <th>Your Grades</th>
                        <th>Average</th>
                        <th>Maximum number of grades</th>
                    </tr>
                    <?php foreach ($assignedCourses as $row) {
                        $maxGrades = (new Grade())->getCourseInfo($row['course_id'])['max_grades']; ?>
                        <tr>
                            <td><?= $row['course'] ?></td>
                            <td><?= $row['grades'] ?></td>
                            <td>
                                <strong>Media aritmetica:</strong> <?= $row['average'] ?> <br />
                                <strong>Media aritmetica rotunjita:</strong> <?= $row['average_round'] ?> <br />
                                <strong>Media aritmetica rotunjita prin lipsa:</strong> <?= $row['average_floor'] ?> <br />
                                <strong>Media aritmetica rotunjita prin adaos:</strong> <?= $row['average_ceil'] ?> <br />
                            </td>
                            <td><?= $maxGrades ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
            <div class="container">
                <div class="cal-box">
                    <form name="calculator">
                        <input class="display" type="text" name="display" placeholder="Do a calculation" readonly>
                        <br>
                        <input class="button-calc" type="button" name="button" value="7" onclick="calculator.display.value +='7'">
                        <input class="button-calc" type="button" name="button" value="8" onclick="calculator.display.value +='8'">
                        <input class="button-calc" type="button" name="button" value="9" onclick="calculator.display.value +='9'">
                        <input class="button-calc mathbutton" type="button" name="button" value="+" onclick="calculator.display.value +='+'">
                        <br>
                        <input class="button-calc" type="button" name="button" value="4" onclick="calculator.display.value +='4'">
                        <input class="button-calc" type="button" name="button" value="5" onclick="calculator.display.value +='5'">
                        <input class="button-calc" type="button" name="button" value="6" onclick="calculator.display.value +='6'">
                        <input class="button-calc" type="button" name="button" value="-" onclick="calculator.display.value +='-'">
                        <br>
                        <input class="button-calc" type="button" name="button" value="1" onclick="calculator.display.value +='1'">
                        <input class="button-calc" type="button" name="button" value="2" onclick="calculator.display.value +='2'">
                        <input class="button-calc" type="button" name="button" value="3" onclick="calculator.display.value +='3'">
                        <input class="button-calc mathbutton" type="button" name="button" value="x" onclick="calculator.display.value +='*'">
                        <br>
                        <input class="button-calc clearButton" type="button" name="button" value="C" onclick="calculator.display.value =''">
                        <input class="button-calc" type="button" name="button" value="0" onclick="calculator.display.value +='0'">
                        <input class="button-calc mathbutton" type="button" name="button" value="=" onclick="calculator.display.value =eval(calculator.display.value)">
                        <input class="button-calc mathbutton" type="button" name="button" value="/" onclick="calculator.display.value +='/'">
                        <br>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>