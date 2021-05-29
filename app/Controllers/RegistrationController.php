<?php
require_once "Database.php";
require_once "StudentController.php";
require_once "CourseController.php";
class Registration {

    public function getAllRegistrations($teacherID) {
        $result = Database::dbQuery("SELECT * FROM applications WHERE teacher_id = $teacherID", (new Database()));
        $result->execute();

        $resultToSend = [];

        if($result->rowCount()) {
            $fetch = $result->fetchAll();

            foreach($fetch as $row) {
                array_push($resultToSend, [
                    'id' => $row['id'],
                    'student' => (new Student())->getStudentByID($row['student_id'])['first_name'],
                    'student_id' => $row['student_id'],
                    'group_letter' => $row['group_letter'],
                    'course' => (new Course())->getCourseByID($row['course_id'])['name'],
                    'course_id' => $row['course_id']
                ]);
            }
        }
        return $resultToSend;
    }
}