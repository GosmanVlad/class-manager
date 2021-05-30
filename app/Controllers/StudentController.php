<?php
require_once "AccountController.php";
require_once "CourseController.php";
require_once "GradeController.php";
class Student extends Account
{

    public function getStudentByID($id)
    {
        $result = Database::dbQuery("SELECT * FROM students WHERE id = '$id'", (new Database()));
        $result->execute();
        $query = $result->fetch();

        $data_to_send = [];

        if ($result->rowCount())
            return $query;

        http_response_code(404);
        return NULL;
    }

    public function getYear($studentID)
    {
        $result = Database::dbQuery("SELECT year FROM students WHERE id = $studentID", (new Database()));
        $result->execute();
        return $result->fetch()['year'];
    }

    public function getGroup($studentID)
    {
        $result = Database::dbQuery("SELECT group_letter FROM students WHERE id = $studentID", (new Database()));
        $result->execute();
        return $result->fetch()['group_letter'];
    }

    public function getScholarship($studentID)
    {
        $result = Database::dbQuery("SELECT scholarship FROM students WHERE id = $studentID", (new Database()));
        $result->execute();
        return $result->fetch()['scholarship'];
    }

    public function getAllCoursesNotAssigned($studentID)
    {
        $studentYear = $this->getYear($studentID);
        $getAssignedCourse = Database::dbQuery("SELECT * FROM courses WHERE year = $studentYear", (new Database()));
        $getAssignedCourse->execute();
        $fetchCourses = $getAssignedCourse->fetchAll();

        $notAssigned = [];
        foreach ($fetchCourses as $rowCourse) {
            $courseID = $rowCourse['id'];

            $getAllocations = Database::dbQuery("SELECT * FROM allocations WHERE student_id = $studentID AND course_id = $courseID", (new Database()));
            $getAllocations->execute();
            $fetch = $getAllocations->fetch();

            if ($getAllocations->rowCount() == 0) {
                array_push($notAssigned, [
                    'course_id' => $courseID,
                    'course' => (new Course())->getCourseByID($courseID)['name'],
                    'credits' => (new Course())->getCourseCredits($courseID),

                ]);
            }
        }
        return $notAssigned;
    }

    public function getAssignedCourses($studentID)
    {
        $getAssignedCourse = Database::dbQuery("SELECT * FROM allocations WHERE student_id = $studentID", (new Database()));
        $getAssignedCourse->execute();

        $result = [];
        if ($getAssignedCourse->rowCount()) {
            $fetch = $getAssignedCourse->fetchAll();

            foreach ($fetch as $row) {
                $teacher = (new Teacher())->getTeacherByCourseID($row['course_id'])['first_name'] . " " . (new Teacher())->getTeacherByCourseID($row['course_id'])['last_name'];
                $teacherID = (new Teacher())->getTeacherByCourseID($row['course_id'])['id'];
                
                array_push($result, [
                    'course' => (new Course())->getCourseByID($row['course_id'])['name'],
                    'course_id' => $row['course_id'],
                    'credits' => (new Course())->getCourseCredits($row['course_id']),
                    'grade' => (new Grade())->getStudentGrade(getAuthID(), $row['course_id']),
                    'teacher' => $teacher,
                    'teacher_id' => $teacherID,
                ]);
            }
        }
        return $result;
    }

    public function sendApplication($studentID, $teacherID, $courseID, $groupLetter)
    {
        $sendApplication = Database::dbQuery("INSERT INTO applications(student_id, teacher_id, course_id, group_letter) VALUES ('$studentID', '$teacherID', '$courseID', '$groupLetter')", (new Database()));
        $sendApplication->execute();
        return 1;
    }
}
