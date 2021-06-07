<?php
require_once "Database.php";
class Course {

    public function getCourseByID($courseID) {
        $result = Database::dbQuery("SELECT * FROM courses WHERE id = $courseID", (new Database()));
        $result->execute();

        if($result->rowCount())
            return $result->fetch();
        http_response_code(404);
        return 0;
    }

    public function getCourseCredits($courseID) {
        $result = Database::dbQuery("SELECT * FROM courses WHERE id = $courseID", (new Database()));
        $result->execute();

        if($result->rowCount())
            return $result->fetch()['credits'];
        http_response_code(404);
        return 0;
    }

    public function getAllStudents($course) {
        $result = Database::dbQuery("SELECT * FROM allocations WHERE course_id = $course", (new Database()));
        $result->execute();
        return $result->rowCount();
    }

    public function getAllAssignedGrades($teacher, $course) {
        $result = Database::dbQuery("SELECT * FROM holders h 
                                    JOIN courses c ON h.course_id = c.id 
                                    JOIN grades g ON g.course_id = c.id 
                                    WHERE h.teacher_id = $teacher AND h.course_id = $course", (new Database()));
        $result->execute();
        return $result->rowCount();
    }

    public function getTeachClasses($teacher, $course) {
        $result = Database::dbQuery("SELECT * FROM allocations a 
                                    JOIN students s ON a.student_id = s.id 
                                    WHERE a.teacher_id = $teacher AND a.course_id = $course", (new Database()));
        $result->execute();

        $index = 0;
        $sendResult = '';

        if($result->rowCount()) {
            $fetch = $result->fetchAll();
            foreach($fetch as $row) {
                if($index == 0) {
                    $sendResult = $row['year'] . $row['group_letter'];
                }
                else {
                    $sendResult = $sendResult . ', ' . $row['year'] . $row['group_letter'];
                }
                $index++;
            }
            return $sendResult;
        }
        return 'None';
    }
}