<?php

declare(strict_types = 1);

namespace App\Domain\AccommodationRental\Entity;

use App\Domain\Blog\ValueObject\AccommodationNature;

final class Owner
{
    private int $id;

    private string $firstName;

    private string $lastName;

    /** @var Accommodation[]  */
    private array $accommodations = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAccommodations(): array
    {
        return $this->accommodations;
    }

    public function setAccommodations(array $accommodations): self
    {
        $this->accommodations = $accommodations;

        return $this;
    }
}
