<?php
require_once "Database.php";
class Allocation {

    public function addStudent($studentID, $courseID) {
        $result = Database::dbQuery("INSERT INTO allocations(student_id, course_id) VALUES ('$studentID', '$courseID')", (new Database()));
        $result->execute();
        return $result->fetch();
    }
}