<?php
//require 'model/User.php';
$pdo = require 'db.php';
//require 'model/UserProvider.php';
//require 'model/Task.php';
//require 'model/TaskProvider.php';


$pdo->exec('CREATE TABLE users (
    id INTEGER NOT NULL  PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(150),
    username TEXT NOT NULL,
    password VARCHAR(100) NOT NULL 
)');



$pdo->exec('CREATE TABLE tasks (
    id INTEGER NOT NULL  PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    description VARCHAR(200) NOT NULL,
    isDone BOOL NOT NULL
)');
//$taskProvider = new TaskProvider($pdo);


