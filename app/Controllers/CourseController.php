<?php
require_once "Database.php";
class Course {

    public function getCourseByID($courseID) {
        $result = Database::dbQuery("SELECT * FROM courses WHERE id = $courseID", (new Database()));
        $result->execute();

        if($result->rowCount())
            return $result->fetch();
        http_response_code(404);
        return 0;
    }

    public function getCourseCredits($courseID) {
        $result = Database::dbQuery("SELECT * FROM courses WHERE id = $courseID", (new Database()));
        $result->execute();

        if($result->rowCount())
            return $result->fetch()['credits'];
        http_response_code(404);
        return 0;
    }

    public function getCoursesByYear($year) {
        
    }
}