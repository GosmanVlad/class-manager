<?php
require_once "Database.php";
class Allocation {

    public function addStudent($studentID, $courseID, $teacherID) {
        try {
            $result = Database::dbQuery("INSERT INTO allocations(student_id, course_id, teacher_id) VALUES ('$studentID', '$courseID', '$teacherID')", (new Database()));
            $result->execute();
        }catch(Exception $exception) {
            echo $exception;
            http_response_code(500);
        }
        http_response_code(200);
    }
}