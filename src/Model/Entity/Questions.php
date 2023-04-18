<?php

namespace App\Model\Entity;

class Questions
{
    private ?int $id = null;
    private ?string $value = null;
    private ?int $theme_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): void
    {
        $this->id = $value;
    }

    public function getTheme_id(): ?int
    {
        return $this->theme_id;
    }

    public function setTheme_id(?int $theme_id): void
    {
        $this->id = $theme_id;
    }
}
