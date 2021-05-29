<?php
require_once "Database.php";

class Application
{
    public function delete($applicationID)
    {
        $result = Database::dbQuery("DELETE FROM applications WHERE id = $applicationID", (new Database()));
        $result->execute();
        return 1;
    }

    public function isInPending($studentID, $courseID)
    {
        $result = Database::dbQuery("SELECT * FROM applications WHERE student_id = $studentID AND course_id = $courseID", (new Database()));
        $result->execute();

        if ($result->rowCount()) {
            $row = $result->fetch();
            $teacher = (new Teacher())->getTeacherByID($row['teacher_id'])['first_name'] . " " . (new Teacher())->getTeacherByID($row['teacher_id'])['last_name'];
            return ['in_pending' => true, 'teacher' => $teacher];
        }
        return ['in_pending' => false];
    }
}
