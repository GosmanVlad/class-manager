<?php
require_once "AccountController.php";
require_once "CourseController.php";
class Teacher extends Account
{

    public function getTeacherByID($id)
    {
        $dbHandle = new Database();

        $result = Database::dbQuery("SELECT * FROM teachers WHERE id = '$id'", $dbHandle);
        $result->execute();
        $query = $result->fetch();

        $data_to_send = [];

        if ($result->rowCount())
            return $query;

        http_response_code(404);
        return NULL;
    }

    public function getCountStudentsByTeacherID($teacherID)
    {
        $result = Database::dbQuery("SELECT * FROM holders h 
                                    JOIN allocations a ON h.course_id = a.course_id 
                                    WHERE h.teacher_id = $teacherID;", (new Database()));
        $result->execute();
        return $result->rowCount();
    }

    public function getCountCoursesByTeacherID($teacherID)
    {
        $result = Database::dbQuery("SELECT * FROM holders WHERE teacher_id = $teacherID;", (new Database()));
        $result->execute();
        return $result->rowCount();
    }

    public function getRegistrationDate($teacherID)
    {
        $result = Database::dbQuery("SELECT registration_date FROM teachers WHERE id = $teacherID", (new Database()));
        $result->execute();
        return $result->fetch();
    }

    public function getTeacherByCourseID($courseID)
    {
        $result = Database::dbQuery("SELECT teacher_id FROM holders WHERE course_id = $courseID", (new Database()));
        $result->execute();

        if ($result->rowCount()) {
            $getTeacherID = $result->fetch()['teacher_id'];
            $result = Database::dbQuery("SELECT * FROM teachers WHERE id = $getTeacherID", (new Database()));
            $result->execute();
            return $result->fetch();
        }
        return ['first_name' => 'Nu s-a gasit'];
    }

    public function getListOfTeachers($courseID)
    {
        $result = Database::dbQuery("SELECT t.id, t.first_name, t.last_name 
                                    FROM holders h 
                                    JOIN teachers t ON h.teacher_id = t.id 
                                    WHERE h.course_id = $courseID", (new Database()));
        $result->execute();

        if ($result->rowCount()) {
            return $result->fetchAll();
        }
        return [['id' => 0, 'first_name' => 'Nu s-a gasit', 'last_name' => '!']];
    }

    public function getCoursesByTeacherID($teacherID)
    {
        $resultToSend = [];

        $result = Database::dbQuery("SELECT * FROM holders WHERE teacher_id = $teacherID;", (new Database()));
        $result->execute();

        if($result->rowCount()) {
            $fetch = $result->fetchAll();

            foreach($fetch as $row) {
                array_push($resultToSend, [
                    'id' => $row['id'],
                    'course_id' => $row['course_id'],
                    'course' => (new Course())->getCourseByID($row['course_id'])['name']
                ]);
            }
        }
        return $resultToSend;
    }

    public function getUncorrectedHomeworks($teacherID) 
    {
        $result = Database::dbQuery("SELECT * FROM assesments WHERE teacher_id = $teacherID AND corrected = 0;", (new Database()));
        $result->execute();
        return $result->rowCount();
    }

    public function getCorrectedHomeworks($teacherID) 
    {
        $result = Database::dbQuery("SELECT * FROM assesments WHERE teacher_id = $teacherID AND corrected = 1;", (new Database()));
        $result->execute();
        return $result->rowCount();
    }
}
