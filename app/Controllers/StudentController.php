<?php
include "Database.php";
class Student {

    private static $dbHandle;

    public function getStudentByID($id)
    {
        $dbHandle = new Database();

        $result = Database::dbQuery("SELECT first_name, last_name FROM students WHERE id = '$id'", $dbHandle);
        $result->execute();
        $query = $result->fetch();
    
        $data_to_send = [];
    
        if($result->rowCount())
        {
            $student = [
                "first_name"=>$query['first_name'], 
                "last_name"=>$query['last_name']
            ];
            
            array_push($data_to_send, $student);
            return json_encode(['status'=>"success", "data"=>$data_to_send]);
        }
    
        $message="No student found";
        http_response_code(404);
        return json_encode(['status'=>"failed", "message"=>$message]);
    }
}
?>