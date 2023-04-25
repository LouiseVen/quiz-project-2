<?php

namespace App\Model\Entity;

class Answers
{

    private ?int $id = null;
    private ?string $name = null;
    private ?bool $is_true = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }
}
