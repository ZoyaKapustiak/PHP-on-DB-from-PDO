<?php
require_once 'Model.php';
class Task extends Model
{
  private int $user_id;
  private ?string $description;
  private DateTime $dateCreated;
  private DateTime $dateUpdated;
  private DateTime $dateDone;
  private int $priority;
  private bool $isDone = false;
  private array $comment;
  public function __construct(int $id = null, string $description = null)
  {
      parent::__construct($id);
    $this->description = $description;
//    $this->priority = $priority;
//    $this->dateCreated = new DateTime();
  }
  public function getDescription(): string
  {
    return $this->description;
  }
  public function getIsDone(): bool
    {
        return $this->isDone;
    }
    /**
     * @param bool $isDone
     */
    public function setIsDone(): void
    {
        $this->isDone = true;
    }
  public function setDescription(string $task, int $priority): void
  {
    $this->description = $task;
    $this->priority = $priority;
    $this->dateUpdated = new DateTime();
  }
  public function setDateUpdate(): DateTime
  {
      return $this->dateUpdated = new DateTime();
  }
  public function getDateUpdate(): DateTime
  {
        return $this->dateUpdated;
  }
  public function setDateDone(): DateTime
  {
        return $this->dateDone = new DateTime();
  }
  public function getDateDone(): DateTime
  {
        return $this->dateDone;
  }
  /**
   * Get the value of priority
   */ 
  public function getPriority(): int
  {
    return $this->priority;
  }
  public function setPriority($priority): int
  {
      return $this->priority = $priority;
  }
  public function markAsDone(): void
  {
        $this->isDone = true;
        $this->dateDone = new DateTime();
  }

    /**
     * @return array
     */
    public function getComment(): array
    {
        return $this->comment;
    }

    /**
     * @param array $comment
     */
    public function setComment(Comment $text): void
    {
        $this->comment[] = $text;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

}