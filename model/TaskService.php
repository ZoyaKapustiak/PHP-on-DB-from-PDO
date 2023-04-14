<?php
require_once 'Task.php';
require_once 'User.php';
require_once  'controller/Comment.php';
class TaskService
{
    public static function addComment(Users $user, Task $task, string $text): void
    {
        $task->setComment(new Comment($user, $task, $text));
    }
}
