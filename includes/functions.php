<?php
session_start();
define("URL", "http://localhost/class/");

function showNavMenu() {
    include $_SERVER['DOCUMENT_ROOT'] . "/class/components/nav-menu.php";
}

function showCards($section, $page = '') {
    if($section == 'home') {
        include $_SERVER['DOCUMENT_ROOT'] . "/class/components/colored-cards.php";
    }
    else if($section == 'selection') {
        $_SESSION['selection-page'] = $page;
        include $_SERVER['DOCUMENT_ROOT'] . "/class/components/animated-cards.php";
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

function getAuthID() {
    if(isset($_SESSION['userid'])) {
        return $_SESSION['userid'];
    }
    return 0;
}