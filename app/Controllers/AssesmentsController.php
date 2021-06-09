<?php
require_once "Database.php";
require_once "CourseController.php";
require_once "TeacherController.php";
require_once "StudentController.php";

class Assesments
{
    public function getAllAssesments($studentID)
    {
        $result = [];

        $sendApplication = Database::dbQuery("SELECT * FROM assesments WHERE student_id = $studentID", (new Database()));
        $sendApplication->execute();

        if ($sendApplication->rowCount()) {
            $fetch = $sendApplication->fetchAll();

            foreach ($fetch as $row) {
                if ($row['teacher_id'])
                    $corrector = (new Teacher())->getTeacherByID($row['teacher_id'])['first_name'] . " " . (new Teacher())->getTeacherByID($row['teacher_id'])['last_name'];
                else
                    $corrector = "nepreluat";

                array_push($result, [
                    'id' => $row['id'],
                    'course' => (new Course())->getCourseByID($row['course_id'])['name'] ?? (new Course())->getCourseByID(2)['name'],
                    'corrector' => $corrector,
                    'file_name' => $row['file_name'],
                    'grade' => $row['grade'] == 0 ? "-" : $row['grade'],
                    'observations' => $row['observations'] ? $row['observations'] : "-",
                    'file' => $row['file'] ?? "-",
                    'sent_at' => $row['sent_at'],
                    'corrected_at' => $row['corrected_at']
                ]);
            }
        }
        return $result;
    }

    public function addAssesment($studentID, $courseID, $path, $fileName)
    {
        try {
            $getTeacherID = (new Teacher())->getTeacherByCourseID($courseID)['id'];
            $sendApplication = Database::dbQuery("INSERT INTO assesments(student_id, course_id, file, file_name, teacher_id) VALUES('$studentID', '$courseID', '$path', '$fileName', '$getTeacherID')", (new Database()));
            $sendApplication->execute();
        }catch(Exception $exception) {
            echo $exception;
            http_response_code(500);
            return 0;
        }
        http_response_code(200);
        return 1;
    }

    public function getAssesmentsByTeacherID($teacherID, $courseID)
    {
        $result = [];

        $getAssesment = Database::dbQuery("SELECT * FROM assesments WHERE teacher_id = $teacherID AND course_id = $courseID ORDER BY corrected", (new Database()));
        $getAssesment->execute();

        if ($getAssesment->rowCount()) {
            $fetch = $getAssesment->fetchAll();

            foreach ($fetch as $row) {
                $student = (new Student())->getStudentByID($row['student_id'])['first_name'] . ' ' . (new Student())->getStudentByID($row['student_id'])['last_name'];
                array_push($result, [
                    'id' => $row['id'],
                    'course' => (new Course())->getCourseByID($row['course_id'])['name'] ?? (new Course())->getCourseByID(2)['name'],
                    'course_id' => $row['course_id'],
                    'file_name' => $row['file_name'],
                    'grade' => $row['grade'] == 0 ? "-" : $row['grade'],
                    'observations' => $row['observations'] ? $row['observations'] : "-",
                    'file' => $row['file'] ?? "-",
                    'student_id' => $row['student_id'],
                    'student' => $student,
                    'corrected' => $row['corrected'],
                    'sent_at' => $row['sent_at']
                ]);
            }
        }
        return $result;
    }

    public function update($assesmentID, $grade, $observations) 
    {
        try {
            $date = date("Y/m/d G:i");
            $getAssesment = Database::dbQuery("UPDATE assesments SET grade = $grade, observations = '$observations', corrected = 1, corrected_at = '$date' WHERE id = $assesmentID", (new Database()));
            $getAssesment->execute();
        }catch(Exception $exception) {
            echo $exception;
            http_response_code(500);
            return 0;
        }
        return 1;
    }

    public function getAverageGrades($teacherID) 
    {
        $getAssesment = Database::dbQuery("SELECT * FROM assesments WHERE teacher_id = $teacherID AND corrected = 1", (new Database()));
        $getAssesment->execute();

        $index = 0;
        $sum = 0;
        if($getAssesment->rowCount()) {
            $fetch = $getAssesment->fetchAll();

            foreach($fetch as $row) {
                $index++;
                $sum = $sum + $row['grade'];
            }
        }
        return $index == 0 ? 0 : $sum/$index;
    }
}
