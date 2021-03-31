<!DOCTYPE html>
<html lang="ro"> 
    <?php include('./components/header.php'); ?>
    <body>
        <h1>Class Manager</h1>
        <?php
            include "app/Controllers/StudentController.php";
            $test = new Student(); 
        ?>

        <?php $ttt = [];
        $ttt = $test->getStudentByID(1) ;
        echo $ttt['last_name'] ?>
    </body>
</html>

<!-- Particular style only for this page  -->
<style>
</style>
