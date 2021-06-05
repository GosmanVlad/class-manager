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
        $resultGrades = [];
        $sumOfGrades = 0;

        if($result->rowCount())
        {
            $index = 0;
            $fetch = $result -> fetchAll();
            foreach ($fetch as $row){
                if($index == 0)
                    $grades = $row['grade'];
                else
                    $grades = $grades.'; '.$row['grade'];
                $sumOfGrades = $sumOfGrades + $row['grade'];
                $index++;
            } 
            http_response_code(200);
            $resultGrades = [
                'grades' => $grades,
                'average' => $index == 0 ? 0 : $sumOfGrades / $index,
                'average_ceil' => ceil($sumOfGrades / $index),
                'average_floor' => floor($sumOfGrades / $index),
                'average_round' => round($sumOfGrades / $index),
            ];
            return $resultGrades;
        }
        http_response_code(404);
    }

    public function sendGrade($studentID, $courseID, $grade) 
    {
        $result = Database::dbQuery("INSERT INTO grades(student_id, course_id, grade) VALUES ('$studentID', '$courseID', '$grade')", (new Database()));
        $result->execute();
    }
}