<?php

class Database extends PDO{

    public function __construct()
    {
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'class-manager';

        parent::__construct("mysql:host=$hostname;dbname=$dbname", $username, $password);
        $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    public static function dbQuery($sqlStatement, $dbHandle) {
        $statement = $dbHandle->prepare($sqlStatement);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->fetchAll();
        return $statement;
    }
}
?>