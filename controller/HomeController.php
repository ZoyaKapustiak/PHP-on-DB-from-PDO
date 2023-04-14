<?php

require_once 'model/User.php';
session_start();

$pageHeader = 'Welcome';

$username = null;
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']->getName();
}

if(isset($_GET['action']) && $_GET['action'] === 'tasks') {
    if (isset($_SESSION['user'])) {
        header('Location: /?controller=tasks');
    }
}
if(isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['user']);
    header('Location: /?controller=home');
    die();
}
if(isset($_GET['action']) && $_GET['action'] === 'security') {
    if (isset($_SESSION['user'])) {
        header('Location: /');
    } else {
        header('Location: /?controller=security');
    }
}


include 'view/home.php';