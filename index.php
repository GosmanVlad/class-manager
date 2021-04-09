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
           
           <div class="row content-center">
               <?php 
                    if(isset($_SESSION['teacher'])) {
                        echo'<div class="column">
                            <div class="card card-blue">
                            <h3>Informatii card 1 profesori</h3>
                            <p>Total studenti: 100</p>
                            </div>
                        </div>';
                    }
                    else if(isset($_SESSION['student'])) {
                        echo'<div class="column">
                            <div class="card card-blue">
                            <h3>Informatii student: '.$_SESSION['last_name'].' '.$_SESSION['first_name'].'</h3>
                            An: 2 <br/>
                            Grupa: 5 <br />
                            Bursa: 0
                            </div>
                        </div>';
                    }
                ?>
                <div class="column">
                    <div class="card card-light">
                    <h3>Informatii card 2</h3>
                    <p>Some text</p>
                    <p>Some text</p>
                    </div>
                </div>
                
                <div class="column">
                    <div class="card card-purple">
                    <h3>Informatii card 3</h3>
                    <p>Some text</p>
                    <p>Some text</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>

<!-- Particular style only for this page  -->
<style>
</style>