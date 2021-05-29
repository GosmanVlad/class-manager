<?php
require_once "Database.php";
require_once "CourseController.php";
require_once "TeacherController.php";

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
                    'file' => $row['file'] ?? "-"
                ]);
            }
        }
        return $result;
    }

    public function addAssesment($studentID, $courseID, $path, $fileName) {
        $getTeacherID = (new Teacher())->getTeacherByCourseID($courseID)['id'];
        $sendApplication = Database::dbQuery("INSERT INTO assesments(student_id, course_id, file, file_name, teacher_id) VALUES('$studentID', '$courseID', '$path', '$fileName', '$getTeacherID')", (new Database()));
        $sendApplication->execute();
        return 1;
    }
}
