<?php
include "AccountController.php";
include "CourseController.php";
class Student extends Account {

    public function getStudentByID($id)
    {
        $result = Database::dbQuery("SELECT * FROM students WHERE id = '$id'", (new Database()));
        $result->execute();
        $query = $result->fetch();
    
        $data_to_send = [];
    
        if($result->rowCount())
            return $query;

        http_response_code(404);
        return NULL;
    }

    public function getYear($studentID) {
        $result = Database::dbQuery("SELECT year FROM students WHERE id = $studentID", (new Database()));
        $result->execute();
        return $result->fetch()['year'];
    }

    public function getGroup($studentID) {
        $result = Database::dbQuery("SELECT group_letter FROM students WHERE id = $studentID", (new Database()));
        $result->execute();
        return $result->fetch()['group_letter'];
    }

    public function getScholarship($studentID) {
        $result = Database::dbQuery("SELECT scholarship FROM students WHERE id = $studentID", (new Database()));
        $result->execute();
        return $result->fetch()['scholarship'];
    }

    public function getAllCoursesNotAssigned($studentID) {
        $getAssignedCourse = Database::dbQuery("SELECT * FROM courses", (new Database()));
        $getAssignedCourse->execute();
        $fetchCourses = $getAssignedCourse->fetchAll();

        $notAssigned = [];
        foreach($fetchCourses as $rowCourse) {
            $courseID = $rowCourse['id'];

            $getAllocations = Database::dbQuery("SELECT * FROM allocations WHERE student_id = $studentID AND course_id = $courseID", (new Database()));
            $getAllocations->execute();
            $fetch = $getAllocations->fetch();
            
            if($getAllocations->rowCount() == 0) {
                array_push($notAssigned, $courseID);
            }
        }
        return $notAssigned;
    }

    public function getAssignedCourses($studentID) {
        $getAssignedCourse = Database::dbQuery("SELECT * FROM allocations WHERE student_id = $studentID", (new Database()));
        $getAssignedCourse->execute();
        return $getAssignedCourse->fetchAll();
    }

    public function sendApplication($studentID, $teacherID, $courseID, $groupLetter) {
        $sendApplication = Database::dbQuery("INSERT INTO applications(student_id, teacher_id, course_id, group_letter) VALUES ('$studentID', '$teacherID', '$courseID', '$groupLetter')", (new Database()));
        $sendApplication->execute();
        return 1;
    }
}
?>