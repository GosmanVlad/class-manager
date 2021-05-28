<?php
require_once "Database.php";
class Course {

    public function getCourseByID($courseID) {
        $result = Database::dbQuery("SELECT * FROM courses WHERE id = $courseID", (new Database()));
        $result->execute();

        if($result->rowCount())
            return $result->fetch();
        return 'Nu s-a gasit';
    }

    public function getCourseCredits($courseID) {
        $result = Database::dbQuery("SELECT * FROM courses WHERE id = $courseID", (new Database()));
        $result->execute();

        if($result->rowCount())
            return $result->fetch()['credits'];
        return 'Nu s-a gasit';
    }
}