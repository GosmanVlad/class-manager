<?php
require_once "Database.php";
class Grade {

    public function getStudentGrade($studentID, $courseID) {
        $result = Database::dbQuery("SELECT * FROM grades WHERE student_id = $studentID AND course_id = $courseID", (new Database()));
        $result->execute();

        if($result->rowCount())
            return $result->fetch();
        http_response_code(404);
    }

    public function getEveryGradesOfStudent($studentID, $courseID) {
        $result = Database::dbQuery("SELECT * FROM grades WHERE student_id = $studentID AND course_id = $courseID", (new Database()));
        $result->execute();
        $grades = '';

        if($result->rowCount())
        {
            $index = 0;
            $fetch = $result -> fetchAll();
            foreach ($fetch as $row){
                if($index == 0)
                    $grades = $row['grade'];
                else
                    $grades = $grades.'; '.$row['grade'];
                
                $index++;
            } 
            http_response_code(200);
            return $grades;
        }
        http_response_code(404);
    }
}