<?php
class Teacher extends Account {

    public function getTeacherByID($id)
    {
        $dbHandle = new Database();

        $result = Database::dbQuery("SELECT * FROM teachers WHERE id = '$id'", $dbHandle);
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