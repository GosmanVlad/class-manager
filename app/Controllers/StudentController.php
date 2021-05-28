<?php
include "AccountController.php";
class Student extends Account {

    public function getStudentByID($id)
    {
        $result = Database::dbQuery("SELECT * FROM students WHERE id = '$id'", (new Database()));
        $result->execute();
        $query = $result->fetch();
    
        $data_to_send = [];
    
        if($result->rowCount())
            return $query;

        http_response_code(404);
        return NULL;
    }
}
?>