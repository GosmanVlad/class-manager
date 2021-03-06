<?php
require_once "AccountController.php";
require_once "CourseController.php";
require_once "GradeController.php";
require_once "TeacherController.php";
require_once "PresenceCodeController.php";
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
        $result = Database::dbQuery("SELECT * FROM students WHERE id = '$studentID'", (new Database()));
        $result->execute();
        if($result->rowCount())
            return $result->fetch()['year'];
        else {
            return 0;
            http_response_code(404);
        };
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

    public function getCountCoursesNotAssigned($studentID)
    {
        $studentYear = $this->getYear($studentID);
        $getAssignedCourse = Database::dbQuery("SELECT * FROM courses WHERE year = $studentYear", (new Database()));
        $getAssignedCourse->execute();
        $fetchCourses = $getAssignedCourse->fetchAll();

        $count = 0;
        foreach ($fetchCourses as $rowCourse) {
            $courseID = $rowCourse['id'];

            $getAllocations = Database::dbQuery("SELECT * FROM allocations WHERE student_id = $studentID AND course_id = $courseID", (new Database()));
            $getAllocations->execute();
            $fetch = $getAllocations->fetch();

            if ($getAllocations->rowCount() == 0) {
                $count++;
            }
        }
        return $count;
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
                    'grades' => (new Grade())->getEveryGradesOfStudent(getAuthID(), $row['course_id'])['grades'] ?? null,
                    'average' => (new Grade())->getEveryGradesOfStudent(getAuthID(), $row['course_id'])['average'] ?? '0',
                    'average_ceil' => (new Grade())->getEveryGradesOfStudent(getAuthID(), $row['course_id'])['average_ceil'] ?? '0',
                    'average_floor' => (new Grade())->getEveryGradesOfStudent(getAuthID(), $row['course_id'])['average_floor'] ?? '0',
                    'average_round' => (new Grade())->getEveryGradesOfStudent(getAuthID(), $row['course_id'])['average_round'] ?? '0',
                    'teacher' => $teacher,
                    'teacher_id' => $teacherID,
                    'presences' => (new PresenceCode())->getPresences(getAuthID(), $row['course_id'])
                ]);
            }
        }
        return $result;
    }

    public function getCountAssignedCourses($studentID)
    {
        $getAssignedCourse = Database::dbQuery("SELECT * FROM allocations WHERE student_id = $studentID", (new Database()));
        $getAssignedCourse->execute();

        $count = 0;
        if ($getAssignedCourse->rowCount()) {
            $fetch = $getAssignedCourse->fetchAll();

            foreach ($fetch as $row) {
                $count++;
            }
        }
        return $count;
    }

    public function sendApplication($studentID, $teacherID, $courseID, $groupLetter)
    {
        try {
            $sendApplication = Database::dbQuery("INSERT INTO applications(student_id, teacher_id, course_id, group_letter) VALUES ('$studentID', '$teacherID', '$courseID', '$groupLetter')", (new Database()));
            $sendApplication->execute();
        }catch(Exception $exception) {
            echo $exception;
            http_response_code(500);
            return 0;
        }
        http_response_code(200);
        return 1;
    }

    public function insertCode($code, $studentID) 
    {
        $checkPresenceCode = Database::dbQuery("SELECT * FROM presence_codes WHERE code = '$code'", (new Database()));
        $checkPresenceCode->execute();

        if($checkPresenceCode->rowCount()) {
            $check = Database::dbQuery("SELECT * FROM presences WHERE presence_code_id = '$code' AND student_id = $studentID", (new Database()));
            $check->execute();

            if($check->rowCount()) 
                return 3; 
            
            $fetch = $checkPresenceCode->fetch();
            $code = $fetch['code'];
            $course = $fetch['course_id'];

            $now = date("Y/m/d G:i");
            $time = new DateTime($now);
            $expirationDate = new DateTime($fetch['expiration_date']);
            $interval = $expirationDate->diff($time);
            $minutes=$interval->format("%i");

            if($minutes <= 5 && $minutes > 0 && $expirationDate > $time) {
                $insertCode = Database::dbQuery("INSERT INTO presences(presence_code_id, student_id, course_id) VALUES('$code', '$studentID', '$course')", (new Database()));
                $insertCode->execute();
                return 1;
            }
            else {
                return 2;
            }
        }
        return 0;
    }

    public function gradesAverage($studentID)
    {
        $grades = Database::dbQuery("SELECT * FROM grades WHERE student_id = '$studentID'", (new Database()));
        $grades->execute();

        $sum = 0;
        $counter = 0;
        if($grades->rowCount()) {
            $fetch = $grades->fetchAll();

            foreach($fetch as  $row) {
                $sum = $sum + $row['grade'];
                $counter++;
            }
        }
        return $counter == 0 ? 0 : $sum/$counter;
    }
}
