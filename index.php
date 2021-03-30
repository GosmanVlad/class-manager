<!DOCTYPE html>
<html lang="ro"> 
    <?php include('./components/header.php'); ?>
    <body>
        <h1>Class Manager</h1>
        <?php
            include "app/Controllers/StudentController.php";
            $test = new Student(); 
        ?>
        <?php $test->getStudentByID(1); 
        $test2=json_decode($test->getStudentByID(1), true); 
        echo $test2["data"][0]["first_name"]; ?>
    </body>
</html>

<!-- Particular style only for this page  -->
<style>
</style>
