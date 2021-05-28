<?php
require_once "Database.php";
class Course {

    public function getCourseByID($courseID) {
        $result = Database::dbQuery("SELECT * FROM courses WHERE id = $courseID", (new Database()));
        $result->execute();
        return $result->fetch();
    }
}