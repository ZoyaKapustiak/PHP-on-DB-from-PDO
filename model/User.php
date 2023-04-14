<?php
require_once 'Model.php';
class User extends Model
{
    private ?string $username;
    private ?string $name;

    public function __construct(int $id = null, string $username = null)
    {
        parent::__construct($id);
        $this->username = $username;
    }

    public function getUserName(): ?string
    {
        return $this->username;
    }
    function setUserName(): string
    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
       return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}