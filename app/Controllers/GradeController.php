<?php
require_once "Database.php";
class Grade {

    public function getStudentGrade($studentID, $courseID) {
        $result = Database::dbQuery("SELECT * FROM grades WHERE student_id = $studentID AND course_id = $courseID", (new Database()));
        $result->execute();

        if($result->rowCount())
            return $result->fetch();
        return 'Nu s-a gasit';
    }
}