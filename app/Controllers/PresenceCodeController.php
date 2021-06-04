<?php
require_once "Database.php";
class PresenceCode 
{
    public function add($code, $expiration, $teacher, $course) 
    {
        try {
            $created = new DateTime("now", new DateTimeZone('Europe/Bucharest'));
            $createdAt = $created->format('Y-m-d H:i');
            $minutesToAdd = $expiration;
            $time = new DateTime("now", new DateTimeZone('Europe/Bucharest'));
            $time->add(new DateInterval('PT' . $minutesToAdd . 'M'));
            $expirationDate = $time->format('Y-m-d H:i');

            $result = Database::dbQuery("INSERT INTO presence_codes(code, created_at, expiration_date, teacher_id, course_id) 
                                        VALUES ('$code', '$createdAt', '$expirationDate', '$teacher', '$course')", (new Database()));
            $result->execute();
        }catch(Exception $exception) {
            echo $exception;
            http_response_code(500);
            return 0;
        }
        http_response_code(200);
        return 1;
    }
    
    public function getPresences($studentID, $courseID){
        $result = Database::dbQuery("SELECT * FROM presences WHERE student_id = $studentID and course_id = $courseID", (new Database()));
        $result->execute();


        return $result -> rowCount();
    }
}