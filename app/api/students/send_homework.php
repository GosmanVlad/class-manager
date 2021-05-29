<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AssesmentsController.php";
$path = $_SERVER['DOCUMENT_ROOT'] . "/class/public/files/";
$path = $path . md5(uniqid(time())) . basename($_FILES['file']['name']) ;
$fileName = $_FILES['file']['name'];

if(move_uploaded_file($_FILES['file']['tmp_name'], $path))
{
    $newPath = str_replace($_SERVER['DOCUMENT_ROOT'] . '/class' . '/', "", $path);
    if(isset($_POST['student-id']) && isset($_POST['course']))
        (new Assesments())->addAssesment($_POST['student-id'], $_POST['course'], $newPath, $fileName);
    header("Location: http://localhost/class/public/assesments.php");
}
?>