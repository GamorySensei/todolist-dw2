<?php

class Task
{
    private int $id;
    private string $title;
    private string $description;
    private DateTime $createdAt;
    private ?DateTime $completedAt; // Nullable : on autorise la valeur "null" ici

    public function __construct(
        int $id, 
        string $title, 
        string $description,
        ?DateTime $createdAt = null,
        ?DateTime $completedAt = null
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;

        // if($createdAt)
        // {
        //     $this->createdAt = $createdAt;
        // }
        // else
        // {
        //     $this->createdAt = new DateTime();
        // }

        $this->createdAt = $createdAt ?? new DateTime();
        $this->completedAt = $completedAt;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of completedAt
     */ 
    public function getCompletedAt()
    {
        return $this->completedAt;
    }

    /**
     * Set the value of completedAt
     *
     * @return  self
     */ 
    public function setCompletedAt($completedAt)
    {
        $this->completedAt = $completedAt;

        return $this;
    }

    public function complete()
    {
        $this->completedAt = new DateTime();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}