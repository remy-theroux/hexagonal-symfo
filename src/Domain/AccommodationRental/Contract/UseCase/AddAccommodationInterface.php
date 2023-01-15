<?php

declare(strict_types = 1);

namespace App\Domain\AccommodationRental\Contract\UseCase;

use App\Domain\AccommodationRental\Entity\Accommodation;
use App\Domain\AccommodationRental\UseCase\Input\AddAccommodationInput;

interface AddAccommodationInterface
{
    public function __invoke(AddAccommodationInput $input): ?Accommodation;
}
