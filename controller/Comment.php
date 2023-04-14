<?php
//require_once 'model/Task.php';
//require_once 'model/User.php';
class Comment {
    private Users $author;
    private Task $task;
    private string $text;

    function __construct(Users $user, Task $task, string $text)
    {
        $this->author = $user;
        $this->task = $task;
        $this->text = $text;
    }

    /**
     * @return Users
     */
    public function getAuthor(): Users
    {
        return $this->author;
    }

    /**
     * @param Users $author
     */
    public function setAuthor(Users $author): void
    {
        $this->author = $author;
    }

    /**
     * @return Task
     */
    public function getTask(): Task
    {
        return $this->task;
    }

    /**
     * @param Task $task
     */
    public function setTask(Task $task): void
    {
        $this->task = $task;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }
}