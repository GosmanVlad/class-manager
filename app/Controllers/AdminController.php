<?php
require_once "Database.php";
require_once "TeacherController.php";

class Admin
{
    public function getTeachersInPending() 
    {
        $result = Database::dbQuery("SELECT * FROM teachers WHERE approved = 0", (new Database()));
        $result->execute();
        $teachers = [];

        if($result->rowCount()) {
            $fetch = $result->fetchAll();

            foreach($fetch as $row) {
                $fullName = $row['first_name'] . ' ' . $row['last_name'];
                array_push($teachers, [
                    'id' => $row['id'],
                    'username' => $row['username'],
                    'first_name' => $row['first_name'],
                    'last_name' => $row['last_name'],
                    'full_name' => $fullName,
                    'email' => $row['email'],
                    'registration_date' => $row['registration_date']
                ]);
            }
        }
        return $teachers;
    }
}