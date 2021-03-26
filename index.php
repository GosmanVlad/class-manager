<!DOCTYPE html>
<html lang="ro"> 
    <?php include('./components/header.php'); 
    require_once('./api/student.php');?>
    <body>
        <h1>Class Manager</h1>
        <?php $test = getStudentByID(1); $test2=json_decode($test, true); echo $test2["data"][0]["first_name"]; ?>
        <?php echo $_GET['id']; ?>
    </body>
</html>

<!-- Particular style only for this page  -->
<style>
</style>
