<?php
require_once "Database.php";
class PresenceCode
{
    public function add($code, $expiration, $teacher, $course)
    {
        try {
            $result = Database::dbQuery("SELECT * FROM presence_codes WHERE course_id = $course AND teacher_id = $teacher", (new Database()));
            $result->execute();

            //Verificam daca mai exista un alt cod generat care inca este valid
            if($result->rowCount()) {
                $fetch = $result->fetchAll();
                foreach($fetch as $row) {
                    $created = new DateTime("now", new DateTimeZone('Europe/Bucharest'));
                    $createdAt = $created->format('Y-m-d H:i:s');

                    if($createdAt < $row['expiration_date']) {
                        http_response_code(500);
                        return 0;
                    }
                }
            }

            $created = new DateTime("now", new DateTimeZone('Europe/Bucharest'));
            $createdAt = $created->format('Y-m-d H:i:s');
            $minutesToAdd = $expiration;
            $time = new DateTime("now", new DateTimeZone('Europe/Bucharest'));
            $time->add(new DateInterval('PT' . $minutesToAdd . 'M'));
            $expirationDate = $time->format('Y-m-d H:i:s');

            $result = Database::dbQuery("INSERT INTO presence_codes(code, created_at, expiration_date, teacher_id, course_id) 
                                        VALUES ('$code', '$createdAt', '$expirationDate', '$teacher', '$course')", (new Database()));
            $result->execute();

            http_response_code(200);
            return $expirationDate;

        }catch(Exception $exception) {
            echo $exception;
            http_response_code(500);
            return 0;
        }
    }

    public function getExpirationDate($code, $teacher, $course) 
    {
        $result = Database::dbQuery("SELECT * FROM presence_codes WHERE teacher_id = $teacher and code = '$code' and course_id = $course", (new Database()));
        $result->execute();

        if($result->rowCount()) {
            $fetch = $result->fetch();
            return $fetch['expiration_date'];
        }
    }
    
    public function getPresences($studentID, $courseID){
        $result = Database::dbQuery("SELECT * FROM presences WHERE student_id = $studentID and course_id = $courseID", (new Database()));
        $result->execute();

        return $result -> rowCount();
    }
}