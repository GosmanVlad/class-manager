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
        $result = Database::dbQuery("SELECT * FROM courses WHERE id = $courseID", (new Database()));
        $result->execute();

        if($result->rowCount()) {
            $fetch = $result->fetch();

            $grades = Database::dbQuery("SELECT * FROM grades WHERE student_id = $studentID AND course_id = $courseID", (new Database()));
            $grades->execute();
            if($grades->rowCount() > $fetch['max_grades'])
                return 0;

            $setGrade = Database::dbQuery("INSERT INTO grades(student_id, course_id, grade) VALUES ('$studentID', '$courseID', '$grade')", (new Database()));
            $setGrade->execute();
            return 1;
        }
    }

    public function getCourseInfo($courseID) 
    {
        $result = Database::dbQuery("SELECT * FROM courses WHERE id = $courseID", (new Database()));
        $result->execute();
        $finalResult = [];

        if($result->rowCount()) {
            $fetch = $result->fetchAll();
            foreach($fetch as $row) {
                $finalResult = [
                    'name' => $row['name'],
                    'year' => $row['year'],
                    'credits' => $row['credits'],
                    'max_grades' => $row['max_grades'] ?? 0
                ];
            }
        }
        return $finalResult;
    }

    public function updateMaxGrade($courseID, $grades) 
    {
        $result = Database::dbQuery("UPDATE courses SET max_grades = $grades WHERE id = $courseID", (new Database()));
        $result->execute();
    }
}