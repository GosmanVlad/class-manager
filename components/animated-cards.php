<?php
if(isset($_SESSION['selection-page'])) {
    $page = $_SESSION['selection-page'];

    if($page == 'class')
        $link = '<a href="class.php" class="button-app">';
    else if($page == 'assesments') 
        $link =  '<a href="assesments.php" class="button-app">';
    else if($page == 'calculator') 
        $link = '<a href="calculator.php" class="button-app">';
}

echo '<nav class="content-center">
<ul class="button-list">
    <p class="button-text">Please choose your subject:</p>';
    //----------------------------------------------------------------------------
    echo "$link";
    echo'<li class="button-item">
        ACSO
        <span class="btn"></span><span class="btn"></span><span class="btn"></span><span
            class="btn"></span>
    </li>
    </a>
    <ul class="button-info">
        <li>Number of students: 200</li>
        <li>Grades assigned: 20</li>
        <li>You teach the following classes: A3, B2, E3</li>
    </ul>';
    //----------------------------------------------------------------------------
    echo "$link";
    echo '<li class="button-item">
        SD
        <span class="btn"></span><span class="btn"></span><span class="btn"></span><span
            class="btn"></span>
    </li>
    </a>
    <ul class="button-info">
        <li>Number of students: 100</li>
        <li>Grades assigned: 16</li>
        <li>You teach the following classes: A1, B4, E1, E2</li>
    </ul>';
    //----------------------------------------------------------------------------
    echo "$link";
    echo '<li class="button-item">
        LOGICA
        <span class="btn"></span><span class="btn"></span><span class="btn"></span><span
            class="btn"></span>
    </li>
    </a>
    <ul class="button-info">
        <li>Number of students: 120</li>
        <li>Grades assigned: 30</li>
        <li>You teach the following classes: A5, B4, E1, E4</li>
    </ul>
</nav>';
?>