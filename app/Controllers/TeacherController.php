<?php
class Teacher extends Account {

    public function getTeacherByID($id)
    {
        $dbHandle = new Database();

        $result = Database::dbQuery("SELECT * FROM teachers WHERE id = '$id'", $dbHandle);
        $result->execute();
        $query = $result->fetch();
    
        $data_to_send = [];
    
        if($result->rowCount())
            return $query;

        http_response_code(404);
        return NULL;
    }

    public function getCountStudentsByTeacherID($teacherID) {
        $result = Database::dbQuery("SELECT * FROM courses c 
                                    JOIN allocations p ON p.course_id = c.id 
                                    JOIN students s ON p.student_id = s.id 
                                    WHERE c.teacher_id=$teacherID", (new Database()));
        $result->execute();
        return $result->rowCount();
    }

    public function getCountCoursesByTeacherID($teacherID) {
        $result = Database::dbQuery("SELECT * FROM courses c 
                                    JOIN teachers t ON c.teacher_id = $teacherID", (new Database()));
        $result->execute();
        return $result->rowCount();
    }

    public function getRegistrationDate($teacherID) {
        $result = Database::dbQuery("SELECT registration_date FROM teachers WHERE id = $teacherID", (new Database()));
        $result->execute();
        return $result->fetch();
    }

    public function getTeacherByCourseID($courseID) {
        $result = Database::dbQuery("SELECT teacher_id FROM courses WHERE id = $courseID", (new Database()));
        $result->execute();
        $getTeacherID = $result->fetch()['teacher_id'];
        
        if($result->rowCount()) {
            $result = Database::dbQuery("SELECT * FROM teachers WHERE id = $getTeacherID", (new Database()));
            $result->execute();
            return $result->fetch();
        }
        return 'Nu s-au gasit rezultate';
    }
}
?>