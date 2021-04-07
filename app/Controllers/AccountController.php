<?php
include "Database.php";
class Account
{

    protected static $dbHandle;

    public static function registerAccount($username, $first_name, $last_name, $email, $password, $account_type, $year = '', $group_letter = '')
    {
        $dbHandle = new Database();
        $checkProblem = self::checkEmailAddress($email, $dbHandle);

        if ($checkProblem == 0) {
            try {
                if($account_type == 'student') {
                    $insert = Database::dbInsert("INSERT INTO students (id, username, first_name, last_name, password, email, year, group_letter) VALUES 
                                                 (NULL, '$username', '$first_name', '$last_name', '$password', '$email', '$year', '$group_letter')", $dbHandle);
                }
                else if($account_type == 'teacher') {
                    $insert = Database::dbInsert("INSERT INTO teachers (id, username, first_name, last_name, password, email) VALUES 
                                                 (NULL, '$username', '$first_name', '$last_name', '$password', '$email')", $dbHandle);
                }
            }catch(\Exception $exception) {
                echo $exception;
            }
            return 1;
        }
        else echo 'This e-mail has been already used!Please try again..';
        return 0;
    }

    public static function checkEmailAddress($email, $dbHandle) {
        $dbQuery = Database::dbQuery("SELECT * FROM students WHERE `email` = '$email'", $dbHandle);
        $dbQuery->execute();

        if ($dbQuery->rowCount() == 0) {

            $dbQuery_t = Database::dbQuery("SELECT * FROM teachers WHERE `email` = '$email'", $dbHandle);
            $dbQuery_t->execute();

            if ($dbQuery_t->rowCount() > 0) {
                return 1;
            }
        } 
        else return 1;
        return 0;
    }

    public static function tryToLogin($email, $password)
    {
        $dbHandle = new Database();

        $dbQuery = Database::dbQuery("SELECT * FROM students WHERE `email` = '$email'", $dbHandle);
        $dbQuery->execute();

        if ($dbQuery->rowCount() == 1) {
            $query = $dbQuery->fetch();
            if ($password == $query['password']) {
                $_SESSION['auth'] = 1;
                $_SESSION['student'] = 1;
                $_SESSION['userid'] = $query['id'];
                $_SESSION['last_name'] = $query['last_name'];
                $_SESSION['first_name'] = $query['first_name'];
                echo 'logat';
                return 1;
            }
        } else if ($dbQuery->rowCount() == 0) {
            $dbQuery = Database::dbQuery("SELECT * FROM teachers WHERE `email` = '$email'", $dbHandle);
            $dbQuery->execute();

            if ($dbQuery->rowCount() == 0) {
                return 0;
            } else {
                $query = $dbQuery->fetch();
                if ($password == $query['password']) {
                    $_SESSION['auth'] = 1;
                    $_SESSION['teacher'] = 1;
                    $_SESSION['userid'] = $query['id'];
                    $_SESSION['last_name'] = $query['last_name'];
                    $_SESSION['first_name'] = $query['first_name'];
                    echo 'logat';
                    return 1;
                }
            }
        } else return 0;
    }
}
