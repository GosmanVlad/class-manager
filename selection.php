<!DOCTYPE html>
<html lang="en">
<?php include('./components/header.php'); 
if(isset($_GET['page']))
    $page = $_GET['page'];
else
    header("Location: index.php");
?>
<body>
    <div class="background-color">
        <?php showNavMenu(); ?>
        <main>
            <?php showCards('selection', $page); ?>
        </main>

    </div>
</body>
</html>