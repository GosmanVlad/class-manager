<?php
require_once "Database.php";
class PresenceCode 
{
    public function add($code, $expiration, $teacher, $course) 
    {
        $createdAt = date("Y/m/d G:i");
        $minutesToAdd = $expiration;
        $time = new DateTime($createdAt);
        $time->add(new DateInterval('PT' . $minutesToAdd . 'M'));
        $expirationDate = $time->format('Y-m-d H:i');

        $result = Database::dbQuery("INSERT INTO presence_codes(code, created_at, expiration_date, teacher_id, course_id) 
                                    VALUES ('$code', '$createdAt', '$expirationDate', '$teacher', '$course')", (new Database()));
        $result->execute();
        return 1;
    }
}