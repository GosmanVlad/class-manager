<!DOCTYPE html>
<html lang="en">
<?php include('./components/header.php'); ?>

<body>
    <div class="content">
        <?php showNavMenu(); ?>
        <main>
            <h1>
                Welcome to Class Manager
            </h1>
            <p>
                Welcome to your Class portal!Here you will find everything you need!
                
            </p>
           <div class="topright">Hello, <?php echo $_SESSION['last_name']; ?></div>
           
        </main>
    </div>
</body>

</html>

<!-- Particular style only for this page  -->
<style>
</style>