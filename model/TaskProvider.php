<?php
class TaskProvider
{
//    private array $tasks;
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getUndoneList(int $user_id): array
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks WHERE user_id = :id AND isDone = :isDone'
        );
        $statement->execute([
            'id' => $user_id,
            'isDone' => false,
        ]);

        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);;

    }
    public function getIsDoneList(int $user_id): array
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks WHERE user_id = :id AND isDone = :isDone'
        );
        $statement->execute([
            'id' => $user_id,
            'isDone' => true,
        ]);

        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);;

    }
    public function setTask(Task $task, ?int $user_id): bool
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (user_id, description, isDone) VALUES (:user_id, :description, :isDone)'
        );
        return $statement->execute([
            'user_id' => $user_id,
            'description' => $task->getDescription(),
            'isDone' => $task->getIsDone(),
        ]);
    }
    public function setIsDoneTask(int $key, int $user_id): void
    {
        $statement = $this->pdo->prepare(
            'UPDATE tasks SET isDone = :isDone WHERE id = :id'
        );
        $statement->execute([
            'id' => $key,
            'isDone' => true,

        ]);
    }
    public function deleteTask(int $key, int $user_id): void
    {
        $statement = $this->pdo->prepare(
            'DELETE FROM tasks WHERE id = :id AND user_id = :user_id'
        );
        $res = $statement->execute([
            'user_id' => $user_id,
            'id' => $key
        ]);
    }
    public function getDescription(): array
    {
       return $this->tasks;
    }
}