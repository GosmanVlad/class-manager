<?php
require_once "Database.php";
class Registration {

    public function getAllRegistrations($teacherID) {
        $result = Database::dbQuery("SELECT * FROM applications WHERE teacher_id = $teacherID", (new Database()));
        $result->execute();
        return $result->fetchAll();
    }
}