<!DOCTYPE html>
<html lang="en">
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/class/components/header.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/class/app/Controllers/AdminController.php";

if(!isAdmin()) 
    header("Location: index.php");
?>

<body>
    <div class="background-color">
        <?php showNavMenu(); ?>
        <main>
            <h2 style="text-align: left;">Admin page</h2>
            <?php if (isAdmin()) { ?>

                <h3>Teachers / Students / Courses who have registered on the platform:</h3>
                <input class="search-input" id="search" type="text" placeholder="Search anything" onblur="searchByName(this.value)">
                <hr>
                <div id="search-table">
                </div>           
            <?php } ?>
        </main>
    </div>
</body>

</html>