<!DOCTYPE html>
<html lang="ro"> 
    <?php include('./components/header.php'); ?>
    <body>
        <h1>Class Manager</h1>
       <?php if(isset($_SESSION['auth'])) {
            echo $_SESSION['auth'];
        } ?>
    </body>
</html>

<!-- Particular style only for this page  -->
<style>
</style>
