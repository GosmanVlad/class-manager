<?php
require_once "Database.php";

class Application {
    public function delete($applicationID) {
        $result = Database::dbQuery("DELETE FROM applications WHERE id = $applicationID", (new Database()));
        $result->execute();
        return 1;
    }

    public function isInPending($studentID, $courseID) {
        $result = Database::dbQuery("SELECT * FROM applications WHERE student_id = $studentID AND course_id = $courseID", (new Database()));
        $result->execute();
        
        if($result->rowCount()) 
            return true;
        return false;
    }
}