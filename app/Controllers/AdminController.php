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

    public function updateApprovedTeacher($id, $approved)
    {
        $result = Database::dbQuery("UPDATE teachers SET approved = $approved WHERE id = $id", (new Database()));
        $result->execute();
        return 1;
    }

    public function deleteTeacherApplication($id)
    {
        $result = Database::dbQuery("DELETE FROM teachers WHERE id = $id", (new Database()));
        $result->execute();
        return 1;
    }

    public function importData($data, $table)
    {
        try {
            if($table == "teachers") {
                foreach($data as $row){
                    $result = Database::dbQuery("INSERT INTO teachers(username, first_name, last_name, password, email, admin, approved) 
                                        VALUES ('$row->username', '$row->first_name', '$row->last_name', '$row->password', '$row->email', '$row->admin', '$row->approved')", (new Database()));
                    $result->execute();
                }
            }
            else if($table == "students") {
                foreach($data as $row){
                    $result = Database::dbQuery("INSERT INTO students(username, first_name, last_name, password, email, year, group_letter, scholarship) 
                                        VALUES ('$row->username', '$row->first_name', '$row->last_name', '$row->password', '$row->email', '$row->year', '$row->group_letter', '$row->scholarship')", (new Database()));
                    $result->execute();
                }
            }
            else if($table == "courses") {
                foreach($data as $row){
                    $result = Database::dbQuery("INSERT INTO courses(name, year, credits, max_grades) 
                                        VALUES ('$row->name', '$row->year', '$row->credits', '$row->max_grades')", (new Database()));
                    $result->execute();
                }
            }
        }catch(Exception $exception) {
            echo $exception;
            return 0;
        }
        return 1;
    }
}
