<?php

declare(strict_types = 1);

namespace App\Domain\AccommodationRental\Entity;

use App\Domain\AccommodationRental\ValueObject\AccommodationNature;

final class Accommodation
{
    private int $id;

    private City $city;

    private ?\DateTime $publishedAt = null;

    private \DateTime $createdAt;

    private ?\DateTime $availableAt = null;

    private AccommodationNature $nature = AccommodationNature::STUDIO;

    private int $roomsNumber = 1;

    private int $bedroomsNumber = 0;

    private Owner $owner;

    public function __construct($nature, $city, $owner, $roomsNumber, $bedroomsNumber, $availableAt)
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCity(): City
    {
        return $this->city;
    }

    public function setCity(City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPublishedAt(): ?\DateTime
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?\DateTime $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getAvailableAt(): ?\DateTime
    {
        return $this->availableAt;
    }

    public function setAvailableAt(?\DateTime $availableAt): self
    {
        $this->availableAt = $availableAt;

        return $this;
    }

    public function getNature(): AccommodationNature
    {
        return $this->nature;
    }

    public function setNature(AccommodationNature $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getRoomsNumber(): int
    {
        return $this->roomsNumber;
    }

    public function setRoomsNumber(int $roomsNumber): self
    {
        $this->roomsNumber = $roomsNumber;

        return $this;
    }

    public function getBedroomsNumber(): int
    {
        return $this->bedroomsNumber;
    }

    public function setBedroomsNumber(int $bedroomsNumber): self
    {
        $this->bedroomsNumber = $bedroomsNumber;

        return $this;
    }

    public function getOwner(): Owner
    {
        return $this->owner;
    }

    public function setOwner(Owner $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
