<?php

declare(strict_types = 1);

namespace App\Domain\AccommodationRental\UseCase\Input;

use App\Domain\AccommodationRental\Entity\City;
use App\Domain\AccommodationRental\Entity\Owner;
use App\Domain\Blog\ValueObject\AccommodationNature;

final class AddAccommodationInput
{
    private City $city;
    private Owner $owner;
    private AccommodationNature $nature = AccommodationNature::STUDIO;
    private int $roomsNumber = 1;
    private int $bedroomsNumber = 0;

    public function getCity(): City
    {
        return $this->city;
    }

    public function getOwner(): Owner
    {
        return $this->owner;
    }

    public function getNature(): AccommodationNature
    {
        return $this->nature;
    }

    public function getRoomsNumber(): int
    {
        return $this->roomsNumber;
    }

    public function getBedroomsNumber(): int
    {
        return $this->bedroomsNumber;
    }

    public function setCity(City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function setOwner(Owner $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function setNature(AccommodationNature $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function setRoomsNumber(int $roomsNumber): self
    {
        $this->roomsNumber = $roomsNumber;

        return $this;
    }

    public function setBedroomsNumber(int $bedroomsNumber): self
    {
        $this->bedroomsNumber = $bedroomsNumber;

        return $this;
    }

}
