<?php

require_once 'model/UserProvider.php';

session_start();
$pdo = require 'db.php';

$error = null;
if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $userPassword] = $_POST;

    $userProvider = new UserProvider($pdo);
    $user = $userProvider->getByUsernameAndPassword($username, $userPassword);
    if($user === null) {
        $error = 'Пользователь с указанными учетными данными не найден';
    } else {
        $_SESSION['user'] = $user;
        $_SESSION['id'] = $user->getId();
    }
    if (isset($_SESSION['user'])) {
        header('Location: /');
        die();
    }
}

include 'view/signin.php';
