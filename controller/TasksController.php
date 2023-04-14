<?php
require_once 'model/Task.php';
require_once 'model/TaskProvider.php';
require_once 'model/User.php';

$pdo = require 'db.php';
session_start();

$pageHeader = 'Задачи';

$username = null;
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']->getUsername();
}else {
    //Перенаправим на главную если пользователь не залогинен
    header("Location: /");
    die();
}


$taskProvider = new TaskProvider($pdo);
$user_id = $_SESSION['user']->getId() ?? null;

if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $taskText = strip_tags($_POST['task']);
    $task = new Task(null, $taskText);
    $taskProvider->setTask($task, $user_id);
    header('Location: /?controller=tasks');
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'done') {
    $key = $_GET['key'];
    $taskProvider->setIsDoneTask($key, $user_id);
    header('Location: /?controller=tasks');
    die();
}
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $key = $_GET['key'];
    $taskProvider->deleteTask($key, $user_id);
    header('Location: /?controller=tasks');
    die();
}
$tasks = $taskProvider->getUndoneList($user_id);
$tasksIsDone = $taskProvider->getIsDoneList($user_id);

include 'view/tasks.php';