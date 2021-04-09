<?php
session_start();
define("URL", "http://localhost/class/");

function showNavMenu() {
    include './components/nav-menu.php';
}

function showCards($section) {
    if($section == 'home') {
        include './components/colored-cards.php'; 
    }
    else if($section == 'selection') {
        include './components/animated-cards.php';
    }
    else echo 'another section';
}

function isLogged() {
    if(isset($_SESSION['auth'])) 
        return 1;
    else 
        return 0;
}

function isTeacher() {
    if(isset($_SESSION['teacher'])) 
        return 1;
    else 
        return 0;
}

function isStudent() {
    if(isset($_SESSION['student'])) 
        return 1;
    else 
        return 0;
}