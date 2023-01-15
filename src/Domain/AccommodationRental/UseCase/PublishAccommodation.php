<?php

declare(strict_types = 1);

namespace App\Domain\AccommodationRental\UseCase;

use App\Domain\AccommodationRental\UseCase\Input\PublishAccommodationInput;
use App\Domain\AccommodationRental\UseCase\Interface\PublishAccommodationInterface;

final class PublishAccommodation implements PublishAccommodationInterface
{
    public function __invoke(PublishAccommodationInput $input): bool
    {
        return false;
    }
}
