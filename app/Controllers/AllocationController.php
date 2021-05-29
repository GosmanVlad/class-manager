<?php
require_once "Database.php";
class Allocation {

    public function addStudent($studentID, $courseID, $teacherID) {
        $result = Database::dbQuery("INSERT INTO allocations(student_id, course_id, teacher_id) VALUES ('$studentID', '$courseID', '$teacherID')", (new Database()));
        $result->execute();
        return $result->fetch();
    }
}