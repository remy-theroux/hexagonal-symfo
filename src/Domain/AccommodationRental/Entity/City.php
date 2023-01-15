<?php

declare(strict_types = 1);

namespace App\Domain\AccommodationRental\Entity;

use App\Domain\Blog\ValueObject\AccommodationNature;

final class City
{
    private int $insee;

    private string $name;

    public function getInsee(): int
    {
        return $this->insee;
    }

    public function setInsee(int $insee): self
    {
        $this->insee = $insee;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
