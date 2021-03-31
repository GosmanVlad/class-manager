<?php
include "Database.php";
class Student {

    private static $dbHandle;

    public function getStudentByID($id)
    {
        $dbHandle = new Database();

        $result = Database::dbQuery("SELECT * FROM students WHERE id = '$id'", $dbHandle);
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