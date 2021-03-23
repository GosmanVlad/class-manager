<?php
session_start();
define("URL", "http://localhost/class/");
require("mysql.php");

//Pentru interogari simple -> INSERT INTO
function vQuery($query)
{
    require("mysql.php");
    $conn->exec($query);
}

function dbQuery($query)
{
    require("mysql.php");
    $statement = $conn->prepare($query);
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $statement->fetchAll();
    return $statement;
}
